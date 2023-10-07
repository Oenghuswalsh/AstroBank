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


    if ($user) {

        if (password_verify($_POST["password"], $user["password_hash"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["user_id"];

            header("Location: myastrobank.php");
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
            <a href="./index.php">
                <h1>AstroBank</h1>
            </a>
        </div>
        <nav>
            <div class="button-container"> <!-- Navigation buttons in header -->
                <button class="button selected" id="banking-button">Banking</button>
                <button class="button" id="loans-button">Home Loans</button>
                <button class="button" id="insurance-button">Insurance</button>
                <button class="button" id="about-button">About Us</button>
                <button class="button" id="contact-button">Contact Us</button>
            </div>
        </nav>
        <div class="desktopDisplays">
            <div class="searchLoginDiv"> <!-- Search box and login button -->
                <div>
                    <div class="button signUpButton">
                        <?php if (isset($user)) : ?>
                            <a href="./myastrobank.php">
                                <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
                            </a>
                        <?php else : ?>
                            <a href="signup.html" class="link">Sign up</a>
                        <?php endif; ?>
                    </div>
                    <form class="searchBox">
                        <button type="submit"><i class="fa fa-search"></i></button>
                        <input type="text" placeholder="Search.." name="search">
                    </form>
                </div>
                <div>
                    <div class="loginButton">
                        <?php if (isset($user)) : ?>
                            <a href="./myastrobank.php" class="link">Back to My AstroBank</a>
                        <?php endif; ?>
                    </div>
                    <div class="loginButton">
                        <?php if (isset($user)) : ?>
                            <a href="logout.php" class="link">Log out</a>
                        <?php else : ?>
                            <a href="login.php" class="link">Log in</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="breadcrumbs">
        <a href="./index.php">AstroBank/</a><a href="./login.php">Login/</a>
    </div>

    <section class="profile_section">
        <h2>Login</h2>
        <div class="profileDetails">
            <?php if ($is_invalid) : ?>
                <em>Invalid login</em>
            <?php endif; ?>
            <form method="post">
                <div>
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" size="15" value="tomstyles@email.com"><br>
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" value="123456789p" size="15">
                </div>
                <br>
                <button class="button loginButton" type="submit">Log in</button>
            </form>
        </div>
    </section>
    <footer class="loginfooter">
        <div class="footerNav">
            <h4>AstroBank</h4>
            <div class="dropdown">
                <button>
                    <h5>Internet Banking <i class="fa fa-caret-down"></i></h5>
                </button>
                <ul class="dropdown-content">
                    <li><?php if (isset($user)) : ?>
                            <a href="./myastrobank.php">Go to My Accounts</a>
                        <?php else : ?>
                            <a href="./login.php">Log in to net banking</a>
                        <?php endif; ?>
                    </li>
                    <li><a href="./homeloans.php">Home Loans</a></li>
                    <li><a href="./homeloans.php">Personal Loans</a></li>
                    <li><a href="./creditcards.php">Credit Cards</a></li>
                    <li><a href="./insurance.php">Insurance</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button>
                    <h5>Support <i class="fa fa-caret-down"></i></h5>
                </button>
                <ul class="dropdown-content">
                    <li><a href="./contact.php">Contact Astro Bank</a></li>
                    <li><a href="./insurance.php">Make a claim</a></li>
                    <li><a href="./contact.php">Find a branch or ATM</a></li>
                    <li><a href="./contact.php">Complaints</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button>
                    <h5>Media and Links <i class="fa fa-caret-down"></i></h5>
                </button>
                <ul class="dropdown-content">
                    <li><a href="./about.php">About Astro Bank</a></li>
                    <li><a href="./about.php">Astro Bank App</a></li>
                    <li><a href="./about.php">Media</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2023 Oenghus Walsh</p>
            <Div class="socialMedia">
                <a href="#"><img class="mediaIcon" src="./Images/facebook.png" alt=""></a>
                <a href="#"><img class="mediaIcon" src="./Images/youtube-32.png" alt=""></a>
                <a href="#"><img class="mediaIcon" src="./Images/twitter.png" alt=""></a>
            </Div>
        </div>
    </footer>
</body>

</html>