<?php
$current_page = basename($_SERVER['PHP_SELF']);
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
            <li><a id="navbar1" href="kocky.php"><?php echo translate('cats'); ?></a></li>
            <li><a id="navbar2" href="kotata.php"><?php echo translate('kittens'); ?></a></li>
            <li><a id="navbar3" href="kocouri.php"><?php echo translate('toms'); ?></a></li>
            <li><a id="navbar4" href="#"><?php echo translate('neuters'); ?></a></li>
            <li><a id="navbar5" href="#"><?php echo translate('plan'); ?></a></li>
            <li><a id="navbar6" href="#"><?php echo translate('gallery'); ?></a></li>
            <li><a id="navbar7" href="#"><?php echo translate('offspring'); ?></a></li>
            <li><a id="navbar8" href="#"><?php echo translate('news'); ?></a></li>
        </ul>

        <?php if (isset($_SESSION['username'])): ?>
            <div class="dropdown">
                <button class="logout-btn"><?php echo translate('logged_in') . $_SESSION['username']; ?>!</button>
                <div class="dropdown-content">
                    <a href="#"><?php echo translate('profile'); ?></a> <!-- Replace with actual link -->
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