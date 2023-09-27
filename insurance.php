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
    <title>Insurance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Load style sheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./CSS/styles.css?<?php echo time(); ?>">
    <script defer src="./JS/drop.js" ?<?php echo time(); ?>></script>

</head>

<body>
    <header>
        <div class="mobileDisplays">
            <img id="menuIcon" class="collapsibleMenu" src="./Images/navicon-round.png" alt="Hambergur menu icon">
            <div>
                <a href="./index.php">
                    <h1>AstroBank</h1>
                </a>
            </div>
            <img id="searchButton" class="searchIcon" src="./Images/search.png" alt="Search symble icon">

        </div>
        <div class="mobileDisplays">
            <form class="searchBox" id="searchForm">
                <button type="submit"><i class="fa fa-search"></i></button>
                <input type="text" placeholder="Search.." name="search">
            </form>
        </div>
        <div class="desktopDisplays">
            <a href="./index.php">
                <h1>AstroBank</h1>
            </a>
        </div>
        <nav class="desktops">
            <div id="navMenu" class="button-container"> <!-- Navigation buttons in header -->
                <button class="button" id="banking-button">Banking</button>
                <button class="button" id="loans-button">Home Loans</button>
                <button class="button" id="insurance-button">Insurance</button>
                <button class="button" id="about-button">About Us</button>
                <button class="button" id="contact-button">Contact Us</button>
            </div>
        </nav>
        <!-- Sign up Login in button and search box for desktop display -->
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
                            <a href="./myastrobank.php" class="link">Back to My Accounts</a>
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

    <div class="sub-buttons desktops"> <!-- Seccond row of Navigation buttons for banking -->
        <button class="button" id="personal-button">Personal</button>
        <button class="button" id="business-button">Business</button>
    </div>
    <div class="subSubButtons desktops"> <!-- Third row of Navigation buttons for banking -->
        <div class="personal-container">
            <div class="dropdown mobileDisplays">
                <div class="button signUpButton">
                    <a href="signup.html" class="link">Sign up</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Accounts</button>
                <div class="dropdown-content"> <!-- links to personal banking content -->
                    <a href="./accounts.php">Everyday account</a>
                    <a href="./accounts.php">Savings</a>
                    <a href="./accounts.php">Term deposit account</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Personal Loans</button>
                <div class="dropdown-content"> <!-- links to personal banking content -->
                    <a href="./accounts.php">Personal loans</a>
                    <a href="./accounts.php">Car loans</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Home loans</button>
                <div class="dropdown-content"> <!-- links to personal banking content -->
                    <a href="./homeloans.php">Loan products</a>
                    <a href="./homeloans.php">Interest rates</a>
                    <a href="./calculator.php">Calculators</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Credits Cards</button>
                <div class="dropdown-content"> <!-- links to personal banking content -->
                    <a href="./creditcards.php">Credit card products</a>
                </div>
            </div>
            <div class="dropdown mobileDisplays">
                <div class="button loginButton">
                    <?php if (isset($user)) : ?>
                        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
                        <a href="logout.php" class="link">Log out</a>
                    <?php else : ?>
                        <a href="login.php" class="link">Log in</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="business-container">
            <div class="dropdown mobileDisplays">
                <div class="button signUpButton">
                    <a href="signup.html" class="link">Sign up</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Accounts</button>
                <div class="dropdown-content"> <!-- links to business banking content -->
                    <a href="./business.php">Business account</a>
                    <a href="./business.php">Trust accounts</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Credit Cards</button>
                <div class="dropdown-content"> <!-- links to business banking content -->
                    <a href="./business.php">Credit card products</a>
                    <a href="./business.php">Lines of credit</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Loans and finance</button>
                <div class="dropdown-content"> <!-- links to business banking content -->
                    <a href="./business.php">Business loans</a>
                    <a href="./business.php">Commerical loans</a>
                    <a href="./business.php">Overdraft accounts</a>
                </div>
            </div>
            <div class="dropdown mobileDisplays">
                <div class="button loginButton">
                    <?php if (isset($user)) : ?>
                        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
                        <a href="logout.php" class="link">Log out</a>
                    <?php else : ?>
                        <a href="login.php" class="link">Log in</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="loans-container"> <!-- Seccond row of Navigation buttons for home loans -->
            <div class="dropdown">
                <button class="button">Loan Products</button>
                <div class="dropdown-content">
                    <a href="./homeloans.php">Loans</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Interest Rates</button>
                <div class="dropdown-content">
                    <a href="./homeloans.php">Interest Rates</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Calculators</button>
                <div class="dropdown-content">
                    <a href="./calculator.php">Calculators</a>
                </div>
            </div>
        </div>
        <div class="insurance-container"> <!-- Seccond row of Navigation buttons for insurance -->
            <div class="dropdown">
                <button class="button">Home and Property</button>
                <div class="dropdown-content"> <!-- links to insurance content -->
                    <a href="#">Home and contents</a>
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
                    <a href="./businessInsurance.php">Compulsory insurance</a>
                    <a href="./businessInsurance.php">Workers compensation insurance</a>
                    <a href="./businessInsurance.php">Public liability insurance</a>
                    <a href="./businessInsurance.php">Asset insurance</a>
                    <a href="./businessInsurance.php">Professional indemnity insurance</a>
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
                    <a href="./about.php">About</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Partnerships</button>
                <div class="dropdown-content"> <!-- links to about us content -->
                    <a href="./about.php">About</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Careers</button>
                <div class="dropdown-content"> <!-- links to about us content -->
                    <a href="./about.php">About</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">News and Media</button>
                <div class="dropdown-content"> <!-- links to about us content -->
                    <a href="./contact.php">Disaster relief support</a>
                    <a href="./contact.php">Small business support</a>
                    <a href="./contact.php">Environment and net zero efforts</a>
                    <a href="./contact.php">Community projects</a>
                </div>
            </div>
        </div>
        <div class="contact-container"> <!-- Seccond row of Navigation buttons for contact us -->
            <div class="dropdown">
                <button class="button">Help Options</button>
                <div class="dropdown-content"> <!-- links to contact us content -->
                    <a href="./contact.php">Online banking</a>
                    <a href="./contact.php">Credit cards</a>
                    <a href="./contact.php">Home loans</a>
                    <a href="./contact.php">Insurance</a>
                    <a href="./contact.php">Lost or stolen cards</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">Contact Us</button>
                <div class="dropdown-content"> <!-- links to contact us content -->
                    <a href="./contact.php">Email</a>
                    <a href="./contact.php">Phone</a>
                    <a href="./contact.php">in Branch</a>
                    <a href="./contact.php">Chat</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="button">How can we help?</button>
                <div class="dropdown-content"> <!-- links to contact us content -->
                    <a href="./contact.php">Chat</a>
                </div>
            </div>
        </div>
    </div>
    <div class="newsCardSection">
        <div class="bankingCardSection">
            <div class="paraCards">
                <p class="cardsParas">Our comprehensive insurance solutions provide security, peace of mind, and financial protection against unexpected events, ensuring your assets are safeguarded.</p>
                <a href="./login.php" class="linkButton">Get a Quote</a>
            </div>
            <div class="newsCards">
                <img class="cardImage" src="./Images/Family_House.jpg" alt="A new house for sale">
            </div>
        </div>
    </div>
    <div class="bankingCardSection">
        <div class="loanCards">
            <h2>Home and Contents insurance</h2>
            <p>Home and contents</p>
            <p>Home building only</p>
            <p>Contents only</p>
            <p>Landlord</p>
            <a href="./login.php" class="linkButton">Apply</a>
        </div>
        <div class="loanCards">
            <h2>Personal Loans</h2>
            <p>Life insurance</p>
            <p>Income protection insurance</p>
            <p>Health insurance</p>
            <p>Hospital cover</p>
            <p>Extras cover</p>
            <a href="./login.php" class="linkButton">Apply</a>
        </div>
    </div>
    <div class="bankingCardSection">
        <div class="loanCards">
            <h2>Car insurance</h2>
            <p>Comprehensive</p>
            <p>Third party</p>
            <p>CTP insurance</p>
            <a href="./login.php" class="linkButton">Apply</a>
        </div>

        <div class="loanCards">
            <h2>Make a Claim</h2>
            <p>Make a claim</p>
            <p>Track a claim</p>
            <a href="./contact.php" class="linkButton">Claims</a>
        </div>
    </div>
    <div class="newsCardSection">
        <div class="bankingCardSection">
            <div class="newsCards">
                <img class="cardImage" src="./Images/Flooded_House.jpg" alt="A flooded suburb">
            </div>
            <div class="paraCards">
                <h2>Home Insurance</h2>
                <p class="cardsParas">Get Storm and Flood Cover automatically included with all AstroBank Home Insurance products.</p>
                <a href="./contact.php" class="linkButton">Contact a insurance specialist</a>
            </div>
        </div>
    </div>
    <footer>
        <h4>AstroBank</h4>
        <div class="footerNav">
            <div>
                <h5>Internet Banking</h5>
                <ul>
                    <li><a href="./login.php">Log in to internet banking</a></li>
                    <li><a href="./homeloans.php">Home Loans</a></li>
                    <li><a href="./personal.php">Personal Loans</a></li>
                    <li><a href="./creditcards.php">Credit Cards</a></li>
                    <li><a href="#">Insurance</a></li>
                </ul>
            </div>
            <div>
                <h5>Support</h5>
                <ul>
                    <li><a href="./contact.php">Contact Astro Bank</a></li>
                    <li><a href="#">Make a claim</a></li>
                    <li><a href="./contact.php">Find a branch or ATM</a></li>
                    <li><a href="./contact.php">Complaints</a></li>
                </ul>
            </div>
            <div>
                <h5>Media and Links</h5>
                <ul>
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