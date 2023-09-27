<?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO users (name, email, password_hash, phone, address, date_of_birth)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "ssssss",
    $_POST["name"],
    $_POST["email"],
    $password_hash,
    $_POST["phone"],
    $_POST["address"],
    $_POST["date_of_birth"]
);


if ($stmt->execute()) {
    // Get the user_id of the inserted user
    $user_id = $mysqli->insert_id;

    // Generate a unique 4-digit account number
    $account_number = generateUniqueAccountNumber($mysqli);

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
    if ($mysqli->errno === 1062) {
        die("Email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
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
