<?php
$current_page = basename($_SERVER['PHP_SELF']); // Získá aktuální název souboru
?>

<nav class="navbar">
    <div class="navbar-left">
        <span class="hamburger-btn material-symbols-rounded">menu</span>
        <a href="../index.php" class="logo">
            <img src="../img/logoText.png" alt="logo">
        </a>
    </div>
    <div class="navbar-right">
        <ul class="links">
            <span class="close-btn material-symbols-rounded">close</span>
            <li><a id="navbar1" href="kocky.php" class="<?= ($current_page == 'kocky.php') ? 'active' : '' ?>">Kočky</a></li>
            <li><a id="navbar2" href="kotata.php" class="<?= ($current_page == 'kotata.php') ? 'active' : '' ?>">Koťata</a></li>
            <li><a id="navbar3" href="kocouri.php" class="<?= ($current_page == 'kocouri.php') ? 'active' : '' ?>">Kocouři</a></li>
            <li><a id="navbar4" href="#" class="<?= ($current_page == 'kastrati.php') ? 'active' : '' ?>">Kastráti</a></li>
            <li><a id="navbar5" href="#" class="<?= ($current_page == 'plan.php') ? 'active' : '' ?>">Plán</a></li>
            <li><a id="navbar6" href="#" class="<?= ($current_page == 'fotogalerie.php') ? 'active' : '' ?>">Fotogalerie</a></li>
            <li><a id="navbar7" href="#" class="<?= ($current_page == 'odchovy.php') ? 'active' : '' ?>">Odchovy</a></li>
            <li><a id="navbar8" href="#" class="<?= ($current_page == 'novinky.php') ? 'active' : '' ?>">Novinky</a></li>
        </ul>

        <?php if (isset($_SESSION['username'])): ?>
            <a href="../php/logout.php" class="logout-btn">Jste přihlášen, <?php echo $_SESSION['username']; ?>!</a>
        <?php else: ?>
            <button id="login" class="login-btn">PŘIHLÁSIT</button>
        <?php endif; ?>

        <select name="" id="lang-select">
            <option value="cz">Čeština</option>
            <option value="en">English</option>
        </select>
    </div>
</nav>