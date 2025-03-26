<?php
session_start();

include("../php/connection.php");
include("../php/functions.php");

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
    <link rel="icon" type="image/x-icon" href="../svg/logo.svg">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/Header.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/info.css">
    <script src="../js/hamburger.js" defer></script>
    <script src="../js/script.js" defer></script>
</head>

<body>
    <header>
        <?php include("navbar.php"); ?>
    </header>

    <?php include("logForm.php"); ?>

    <main>
        <section class="description">
            <h2><?php echo translate('why_adopt'); ?></h2>
            <p><?php echo translate('why_adopt_text'); ?></p>
            <h2><?php echo translate('adoption_conditions'); ?></h2>
            <p><?php echo translate('adoption_conditions_text'); ?></p>
            <ul>
                <li><?php echo translate('condition1'); ?></li>
                <li><?php echo translate('condition2'); ?></li>
                <li><?php echo translate('condition3'); ?></li>
            </ul>
            <h2><?php echo translate('adoption_process'); ?></h2>
            <ul>
                <li><?php echo translate('process_step1'); ?></li>
                <li><?php echo translate('process_step2'); ?></li>
                <li><?php echo translate('process_step3'); ?></li>
                <li><?php echo translate('process_step4'); ?></li>
                <li><?php echo translate('process_step5'); ?></li>
            </ul>

            <h2><?php echo translate('what_you_get'); ?></h2>

            <p><?php echo translate('what_you_get_text'); ?></p>
            <ul>
                <li><?php echo translate('get_item1'); ?></li>
                <li><?php echo translate('get_item2'); ?></li>
                <li><?php echo translate('get_item3'); ?></li>
                <li><?php echo translate('get_item4'); ?></li>
            </ul>
        </section>
    </main>
</body>

</html>