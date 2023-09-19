<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users
            WHERE user_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>AstroBank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Load style sheet -->
    <link rel="stylesheet" type="text/css" href="./CSS/styles.css?<?php echo time(); ?>">
    <script defer src="./JS/drop.js" ?<?php echo time(); ?>></script>

</head>

<body>
    <header>
        <div class="siteName">
            <h1>AstroBank</h1>
        </div>
        <nav>
            <div class="button-container">
                <button class="button" id="banking-button">Banking</button>
                <button class="button" id="loans-button">Home Loans</button>
                <button class="button" id="insurance-button">Insurance</button>
                <button class="button" id="about-button">About Us</button>
                <button class="button" id="contact-button">Contact Us</button>
            </div>
        </nav>
        <div>
            <div class="profileDetails">
                <?php if (isset($user)) : ?>
                    <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
                    <a href="profile.php" class="button">Update Profile</a>
                    <a href="logout.php" class="button">Log out</a>
                <?php else : ?>
                    <a href="login.php" class="button">Log in</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <div class="sub-buttons">
        <button class="button" id="personal-button">Personal</button>
        <button class="button" id="business-button">Business</button>
    </div>
    <div class="subSubButtons">
        <div class="personal-container">
            <div class="dropdown">
                <button class="button">Accounts</button>
                <div class="dropdown-content">
                    <a href="./index.php">Everyday account</a>
                    <a href="#">Savings</a>
                    <a href="#">Term deposit account</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Personal Loans</button>
                <div class="dropdown-content">
                    <a href="#">Personal loans</a>
                    <a href="#">Car loans</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Home loans</button>
                <div class="dropdown-content">
                    <a href="#">Loan products</a>
                    <a href="#">Interest rates</a>
                    <a href="#">Calculators</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Credits Cards</button>
                <div class="dropdown-content">
                    <a href="#">Credit card products</a>
                </div>
            </div>
        </div>
        <div class="business-container">
            <div class="dropdown">
                <button class="button">Accounts</button>
                <div class="dropdown-content">
                    <a href="./index.php">Business account</a>
                    <a href="#">Trust accounts</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Credit Cards</button>
                <div class="dropdown-content">
                    <a href="#">Credit card products</a>
                    <a href="#">Lines of credit</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Loans and finance</button>
                <div class="dropdown-content">
                    <a href="#">Business loans</a>
                    <a href="#">Commerical loans</a>
                    <a href="#">Overdraft accounts</a>
                </div>
            </div>
        </div>
        <div class="loans-container">
            <div class="dropdown">
                <button class="button">Loan Products</button>
                <div class="dropdown-content">
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Interest Rates</button>
                <div class="dropdown-content">
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Calculators</button>
                <div class="dropdown-content">
                </div>
            </div>
        </div>
        <div class="insurance-container">
            <div class="dropdown">
                <button class="button">Home and Property</button>
                <div class="dropdown-content">
                    <a href="./index.php">Home and contents</a>
                    <a href="#">Home building only</a>
                    <a href="#">Contents only</a>
                    <a href="#">Landlord insurance</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Car</button>
                <div class="dropdown-content">
                    <a href="#">Comprehensive</a>
                    <a href="#">Third party</a>
                    <a href="#">CTP insurance</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Life and Income</button>
                <div class="dropdown-content">
                    <a href="#">Life insurance</a>
                    <a href="#">Income protection insurance</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Health insurance</button>
                <div class="dropdown-content">
                    <a href="#">Health insurance</a>
                    <a href="#">Hospital cover</a>
                    <a href="#">Extra cover</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Business insurance</button>
                <div class="dropdown-content">
                    <a href="#">Compulsory insurance</a>
                    <a href="#">Workers compensation insurance</a>
                    <a href="#">Public liability insurance</a>
                    <a href="#">Asset insurance</a>
                    <a href="#">Professional indemnity insurance</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Claims</button>
                <div class="dropdown-content">
                    <a href="#">Make a claim</a>
                    <a href="#">Track a claim</a>
                </div>
            </div>
        </div>
        <div class="about-container">
            <div class="dropdown">
                <button class="button">About Us</button>
                <div class="dropdown-content">
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Partnerships</button>
                <div class="dropdown-content">
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Careers</button>
                <div class="dropdown-content">
                </div>
            </div>
            <div class="dropdown">
                <button class="button">News and Media</button>
                <div class="dropdown-content">
                    <a href="#">Disaster relief support</a>
                    <a href="#">Small business support</a>
                    <a href="#">Environment and net zero efforts</a>
                    <a href="#">Community projects</a>
                </div>
            </div>
        </div>
        <div class="contact-container">
            <div class="dropdown">
                <button class="button">Help Options</button>
                <div class="dropdown-content">
                    <a href="./index.php">Online banking</a>
                    <a href="#">Credit cards</a>
                    <a href="#">Home loans</a>
                    <a href="#">Insurance</a>
                    <a href="#">Lost or stolen cards</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Contact Us</button>
                <div class="dropdown-content">
                    <a href="#">Email</a>
                    <a href="#">Phone</a>
                    <a href="#">in Branch</a>
                    <a href="#">Chat</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">How can we help?</button>
                <div class="dropdown-content">
                </div>
            </div>
        </div>
    </div>




</body>

</html>