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
            <li><a id="navbar1" href="kocky.php" class="<?= ($current_page == 'kocky.php') ? 'active' : '' ?>"><?php echo translate('cats'); ?></a></li>
            <li><a id="navbar2" href="kocouri.php" class="<?= ($current_page == 'kocouri.php') ? 'active' : '' ?>"><?php echo translate('toms'); ?></a></li>
            <li><a id="navbar3" href="kastrati.php" class="<?= ($current_page == 'kastrati.php') ? 'active' : '' ?>"><?php echo translate('castrates'); ?></a></li>
            <li><a id="navbar4" href="#" class="<?= ($current_page == 'kotata.php') ? 'active' : '' ?>"><?php echo translate('kittens'); ?></a></li>
            <li><a id="navbar5" href="#" class="<?= ($current_page == 'odchovy.php') ? 'active' : '' ?>"><?php echo translate('offspring'); ?></a></li>
            <li><a id="navbar6" href="novinky.php" class="<?= ($current_page == 'novinky.php') ? 'active' : '' ?>"><?php echo translate('news'); ?></a></li>
            <li><a id="navbar7" href="kontakt.php" class="<?= ($current_page == 'kontakt.php') ? 'active' : '' ?>"><?php echo translate('contact'); ?></a></li>

            <!-- Odkaz na admin panel (zobrazí se pouze adminům) -->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                <li><a id="navbar-admin" href="admin/admin_panel.php" class="<?= ($current_page == 'admin/admin_panel.php') ? 'active' : '' ?>">Admin</a></li>
            <?php endif; ?>
        </ul>

        <?php if (isset($_SESSION['username'])): ?>
            <div class="dropdown">
                <button class="logout-btn"><?php echo translate('logged_in') . ' ' . $_SESSION['username']; ?>!</button>
                <div class="dropdown-content">
                    <a href="../pages/profile.php"><?php echo translate('profile'); ?></a>
                    <a href="../php/logout.php?redirect=<?= urlencode($_SERVER['PHP_SELF']); ?>" class="logout-link"><?php echo translate('logout'); ?></a>
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