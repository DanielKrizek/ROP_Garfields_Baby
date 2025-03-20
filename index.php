<?php
session_start();

include("php/connection.php");
include("php/functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $error = login($conn, $username, $password);
    } elseif (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $message = signup($conn, $username, $password);
    } elseif (isset($_POST['lang-select'])) {
        $_SESSION['lang'] = $_POST['lang-select'];
    } elseif (isset($_POST['logout'])) {
        logout(); // Use the updated logout function
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garfields Baby</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/Header.css">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <script src="js/hamburger.js" defer></script>
    <script src="js/script.js" defer></script>
    <script src="js/modal.js" defer></script>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <span class="hamburger-btn material-symbols-rounded">menu</span>
                <a href="#" class="logo">
                    <img src="img/logoText.png" alt="logo">
                </a>
            </div>
            <div class="navbar-right">
                <ul class="links">
                    <li><a id="navbar1" href="pages/kocky.php"><?php echo translate('cats'); ?></a></li>
                    <li><a id="navbar2" href="pages/kocouri.php"><?php echo translate('toms'); ?></a></li>
                    <li><a id="navbar3" href="pages/kastrati.php"><?php echo translate('castrates'); ?></a></li>
                    <li><a id="navbar4" href="pages/kotata.php"><?php echo translate('kittens'); ?></a></li>
                    <li><a id="navbar5" href="pages/odchovy.php"><?php echo translate('offspring'); ?></a></li>
                    <li><a id="navbar6" href="pages/novinky.php"><?php echo translate('news'); ?></a></li>
                    <li><a id="navbar7" href="pages/kontakt.php"><?php echo translate('contact'); ?></a></li>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                        <li><a id="navbar-admin" href="pages/admin/admin_panel.php" class="<?= ($current_page == 'pages/admin/admin_panel.php') ? 'active' : '' ?>">Admin</a></li>
                    <?php endif; ?>
                </ul>

                <?php if (isset($_SESSION['username'])): ?>
                    <div class="dropdown">
                        <button class="logout-btn"><?php echo translate('logged_in') . $_SESSION['username']; ?>!</button>
                        <div class="dropdown-content">
                            <a href="pages/profile.php"><?php echo translate('profile'); ?></a>
                            <a href="php/logout.php" class="logout-link"><?php echo translate('logout'); ?></a>
                        </div>
                    </div>
                <?php else: ?>
                    <button id="login" class="login-btn"><?php echo translate('login'); ?></button>
                <?php endif; ?>

                <form method="post">
                    <select name="lang-select" id="lang-select" onchange="this.form.submit()">
                        <option value="cz" <?php echo (isset($_SESSION['lang']) && $_SESSION['lang'] == 'cz') ? 'selected' : ''; ?>>Čeština</option>
                        <option value="en" <?php echo (isset($_SESSION['lang']) && $_SESSION['lang'] == 'en') ? 'selected' : ''; ?>>English</option>
                    </select>
                </form>
            </div>
        </nav>
    </header>


    <?php include("pages/logForm.php"); ?>

    <main>
        <section class="description">
            <h1><?php echo translate('welcome'); ?></h1>
            <p> <?php echo translate('description-text'); ?></p>
        </section>

        <section class="hero">
            <img src="img/kocka_dlouha.jpg" alt="<?php echo translate('main_image'); ?>">
            <a href="pages/info.php" class="btn"><?php echo translate('for_interested'); ?></a>
        </section>

        <section class="info-section">
            <div class="info-box">
                <img src="img/kocka.jpg" alt="Kočky">
                <a href="pages/kocky.php" class="info-btn"><?php echo translate('view_cats'); ?></a>
            </div>
            <div class="info-box">
                <img src="img/kocour.jpg" alt="Kocouři">
                <a href="pages/kocouri.php" class="info-btn"><?php echo translate('view_toms'); ?></a>
            </div>
            <div class="info-box">
                <img src="img/kote.jpg" alt="Kastráti">
                <a href="pages/kastrati.php" class="info-btn"><?php echo translate('view_castrates'); ?></a>
            </div>
        </section>
    </main>

</body>

</html>