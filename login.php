<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf(
        "SELECT * FROM users
                    WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
    var_dump($user);
    if ($user) {

        if (password_verify($_POST["password"], $user["password_hash"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["user_id"];

            header("Location: index.php");
            exit;
        }
    }

    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>AstroBank Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Load style sheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./CSS/styles.css?<?php echo time(); ?>">
    <script defer src="./JS/drop.js" ?<?php echo time(); ?>></script>

</head>

<body>
    <header>
        <div class="siteName">
            <h1>AstroBank</h1>
        </div>
        <nav>
            <div class="button-container"> <!-- Navigation buttons in header -->
                <button class="button" id="banking-button">Banking</button>
                <button class="button" id="loans-button">Home Loans</button>
                <button class="button" id="insurance-button">Insurance</button>
                <button class="button" id="about-button">About Us</button>
                <button class="button" id="contact-button">Contact Us</button>
            </div>
        </nav>
        <div class="searchLoginDiv"> <!-- Search box and login button -->
            <form class="searchBox">
                <button type="submit"><i class="fa fa-search"></i></button>
                <input type="text" placeholder="Search.." name="search">
            </form>

        </div>
    </header>

    <section class="profile_section">
        <h2>Login</h2>
        <div class="profileDetails">
            <?php if ($is_invalid) : ?>
                <em>Invalid login</em>
            <?php endif; ?>
            <form method="post">
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"><br>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password">
                <button class="loginButton" type="submit">Log in</button>
            </form>
        </div>
    </section>

</body>

</html>