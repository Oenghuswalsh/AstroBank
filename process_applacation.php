<?php
# Start session and login user to MYSQL database
session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users
            WHERE user_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate user input
    $account_type = $_POST["account_type"];
    $deposit = $_POST["deposit"];

    // Validate if the deposit amount is valid (greater than or equal to $1)
    if ($deposit < 1) {
        $_SESSION['error_message'] = "Deposit amount must be at least $1.";
        header("Location: account_applaction.php");
        exit;
    }


    // Get the user_id of the logged-in user from the session user_id
    $user_id = $_SESSION["user_id"];

    $account_type = $_POST["account_type"];

    if ($account_type === "Select an account type") {
        $_SESSION['error_message'] = "Please select an account type.";
        header("Location: account_applaction.php");
        exit;
    }

    // Check if the account_type is already associated with the current user_id
    $check_sql_account_type = "SELECT COUNT(*) FROM accounts JOIN bank on bank.account_number = accounts.account_number WHERE user_id = ? AND account_type = ?";
    $check_stmt_account_type = $mysqli->prepare($check_sql_account_type);

    if (!$check_stmt_account_type) {
        die("SQL error: " . $mysqli->error);
    }

    $check_stmt_account_type->bind_param("is", $user_id, $account_type);
    $check_stmt_account_type->execute();
    $check_stmt_account_type->bind_result($account_type_count);
    $check_stmt_account_type->fetch();
    $check_stmt_account_type->close();

    if ($account_type_count > 0) {
        $_SESSION['error_message'] = "Account type already exists. Please choose a different account type.";
        header("Location: account_applaction.php");
        exit;
    }

    // Generate a unique 4-digit account number
    $account_number = generateUniqueAccountNumber($mysqli);

    // Insert data into the "accounts" table
    $transaction_date = date("Y-m-d");
    $location = "online";
    $withdrawal = 0;
    $balance = $deposit;

    $sql_accounts = "INSERT INTO accounts (account_number, account_type, transaction_date, location, deposit, withdrawal, balance)
                     VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_accounts = $mysqli->prepare($sql_accounts);

    if (!$stmt_accounts) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt_accounts->bind_param("isssiii", $account_number, $account_type, $transaction_date, $location, $deposit, $withdrawal, $balance);

    if ($stmt_accounts->execute()) {
        // Insert user_id and account_number into the "bank" table
        $sql_bank = "INSERT INTO bank (user_id, account_number) VALUES (?, ?)";
        $stmt_bank = $mysqli->prepare($sql_bank);

        if (!$stmt_bank) {
            die("SQL error: " . $mysqli->error);
        }

        $stmt_bank->bind_param("is", $user_id, $account_number);

        if ($stmt_bank->execute()) {
            header("Location: myastrobank.php");
            exit;
        } else {
            die("Error inserting data into 'bank' table: " . $stmt_bank->error);
        }
    } else {
        die("Error inserting data into 'accounts' table: " . $stmt_accounts->error);
    }
}

// Function to generate a unique 4-digit account number
function generateUniqueAccountNumber($mysqli)
{
    $unique = false;
    $account_number = "";

    while (!$unique) {
        // Generate a random 4-digit number
        $account_number = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

        // Check if the account number already exists in the "bank" table
        $check_sql = "SELECT COUNT(*) FROM bank WHERE account_number = ?";
        $check_stmt = $mysqli->prepare($check_sql);

        if (!$check_stmt) {
            die("SQL error: " . $mysqli->error);
        }

        $check_stmt->bind_param("s", $account_number);
        $check_stmt->execute();
        $check_stmt->bind_result($count);
        $check_stmt->fetch();
        $check_stmt->close();

        if ($count == 0) {
            $unique = true;
        }
    }

    return $account_number;
}
