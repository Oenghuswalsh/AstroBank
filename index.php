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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>AstroBank</title>
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
            <div>
                <div class="button signUpButton">
                    <a href="signup.html" class="link">Sign up</a>
                </div>
                <form class="searchBox">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    <input type="text" placeholder="Search.." name="search">
                </form>
            </div>
            <div class="loginButton">
                <?php if (isset($user)) : ?>
                    <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
                    <a href="logout.php" class="link">Log out</a>
                <?php else : ?>
                    <a href="login.php" class="link">Log in</a>
                <?php endif; ?>
            </div>

        </div>
    </header>
    <div class="sub-buttons"> <!-- Seccond row of Navigation buttons for banking -->
        <button class="button" id="personal-button">Personal</button>
        <button class="button" id="business-button">Business</button>
    </div>
    <div class="subSubButtons"> <!-- Third row of Navigation buttons for banking -->
        <div class="personal-container">
            <div class="dropdown">
                <button class="button">Accounts</button>
                <div class="dropdown-content"> <!-- links to personal banking content -->
                    <a href="./index.php">Everyday account</a>
                    <a href="#">Savings</a>
                    <a href="#">Term deposit account</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Personal Loans</button>
                <div class="dropdown-content"> <!-- links to personal banking content -->
                    <a href="#">Personal loans</a>
                    <a href="#">Car loans</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Home loans</button>
                <div class="dropdown-content"> <!-- links to personal banking content -->
                    <a href="#">Loan products</a>
                    <a href="#">Interest rates</a>
                    <a href="#">Calculators</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Credits Cards</button>
                <div class="dropdown-content"> <!-- links to personal banking content -->
                    <a href="#">Credit card products</a>
                </div>
            </div>
        </div>
        <div class="business-container">
            <div class="dropdown">
                <button class="button">Accounts</button>
                <div class="dropdown-content"> <!-- links to business banking content -->
                    <a href="./index.php">Business account</a>
                    <a href="#">Trust accounts</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Credit Cards</button>
                <div class="dropdown-content"> <!-- links to business banking content -->
                    <a href="#">Credit card products</a>
                    <a href="#">Lines of credit</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Loans and finance</button>
                <div class="dropdown-content"> <!-- links to business banking content -->
                    <a href="#">Business loans</a>
                    <a href="#">Commerical loans</a>
                    <a href="#">Overdraft accounts</a>
                </div>
            </div>
        </div>
        <div class="loans-container"> <!-- Seccond row of Navigation buttons for home loans -->
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
        <div class="insurance-container"> <!-- Seccond row of Navigation buttons for insurance -->
            <div class="dropdown">
                <button class="button">Home and Property</button>
                <div class="dropdown-content"> <!-- links to insurance content -->
                    <a href="./index.php">Home and contents</a>
                    <a href="#">Home building only</a>
                    <a href="#">Contents only</a>
                    <a href="#">Landlord insurance</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Car</button>
                <div class="dropdown-content"> <!-- links to insurance content -->
                    <a href="#">Comprehensive</a>
                    <a href="#">Third party</a>
                    <a href="#">CTP insurance</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Life and Income</button>
                <div class="dropdown-content"> <!-- links to insurance content -->
                    <a href="#">Life insurance</a>
                    <a href="#">Income protection insurance</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Health insurance</button>
                <div class="dropdown-content"> <!-- links to insurance content -->
                    <a href="#">Health insurance</a>
                    <a href="#">Hospital cover</a>
                    <a href="#">Extra cover</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Business insurance</button>
                <div class="dropdown-content"> <!-- links to insurance content -->
                    <a href="#">Compulsory insurance</a>
                    <a href="#">Workers compensation insurance</a>
                    <a href="#">Public liability insurance</a>
                    <a href="#">Asset insurance</a>
                    <a href="#">Professional indemnity insurance</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Claims</button>
                <div class="dropdown-content"> <!-- links to insurance content -->
                    <a href="#">Make a claim</a>
                    <a href="#">Track a claim</a>
                </div>
            </div>
        </div>
        <div class="about-container"> <!-- Seccond row of Navigation buttons for about us -->
            <div class="dropdown">
                <button class="button">About Us</button>
                <div class="dropdown-content"> <!-- links to about us content -->
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Partnerships</button>
                <div class="dropdown-content"> <!-- links to about us content -->
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Careers</button>
                <div class="dropdown-content"> <!-- links to about us content -->
                </div>
            </div>
            <div class="dropdown">
                <button class="button">News and Media</button>
                <div class="dropdown-content"> <!-- links to about us content -->
                    <a href="#">Disaster relief support</a>
                    <a href="#">Small business support</a>
                    <a href="#">Environment and net zero efforts</a>
                    <a href="#">Community projects</a>
                </div>
            </div>
        </div>
        <div class="contact-container"> <!-- Seccond row of Navigation buttons for contact us -->
            <div class="dropdown">
                <button class="button">Help Options</button>
                <div class="dropdown-content"> <!-- links to contact us content -->
                    <a href="./index.php">Online banking</a>
                    <a href="#">Credit cards</a>
                    <a href="#">Home loans</a>
                    <a href="#">Insurance</a>
                    <a href="#">Lost or stolen cards</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Contact Us</button>
                <div class="dropdown-content"> <!-- links to contact us content -->
                    <a href="#">Email</a>
                    <a href="#">Phone</a>
                    <a href="#">in Branch</a>
                    <a href="#">Chat</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">How can we help?</button>
                <div class="dropdown-content"> <!-- links to contact us content -->
                </div>
            </div>
        </div>
    </div>




</body>

</html>