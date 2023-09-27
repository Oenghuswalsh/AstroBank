<div class="mobileDisplays">
    <div>
        <div class="siteName">
            <h1>AstroBank</h1>
        </div>
        <nav>
            <div class="button-container"> <!-- Navigation buttons in header -->
                <button class="button" id="banking-btn">Banking</button>
                <button class="button" id="loans-btn">Home Loans</button>
                <button class="button" id="insurance-btn">Insurance</button>
                <button class="button" id="about-btn">About Us</button>
                <button class="button" id="contact-btn">Contact Us</button>
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

    </div>
</div>