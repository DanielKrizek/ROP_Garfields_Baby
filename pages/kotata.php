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
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/Header.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/grid.css">
    <script src="../js/hamburger.js" defer></script>
    <script src="../js/script.js" defer></script>

</head>

<body>
    <header>
        <?php include("navbar.php"); ?>
    </header>

    <?php include("logForm.php"); ?>


    <div class="blocks-row">
        <div class="block">
            <div class="big-image"></div>
            <div class="small-images">
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
            </div>
            <div class="info">
                <strong>ZUCCHERO A LYNX STAR</strong><br>
                19. 8. 2018<br>
                černá stříbřitá mramorovaná s bílou<br> (ns 09 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: Pillowtalk's Michigan<br>
                Matka: Katherine Kerry A Lynx Star<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image"></div>
            <div class="small-images">
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
            </div>
            <div class="info">
                <strong>LOKI BLUE LAGUNA LEO</strong><br>
                27. 5. 2016<br>
                modrá s bílou<br> (a 09)<br>
                <strong>Rodokmen</strong><br>
                Otec: ICH (WCF) Flip-Flop's Focus<br>
                Matka: Marilyn Laguna Leo<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image"></div>
            <div class="small-images">
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
            </div>
            <div class="info">
                <strong>LUKAS BACCARACOON</strong><br>
                7. 9. 2013<br>
                červená stříbřitá mramorovaná s bílou<br> (ds 09 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: ICH Fuzzy, Lavender Love<br>
                Matka: Kalista Violet, Velvet Duckie<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image"></div>
            <div class="small-images">
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
            </div>
            <div class="info">
                <strong>QUEENY BELLA A LYNX STAR</strong><br>
                20. 1. 2016<br>
                modrá mramorovaná s bílou<br> (a 09 22)<br>
                <strong>Rodokmen</strong><br>
                Matka: Marylin Hairy Majesty<br>
                Otec: Pillowtalk's Wannabe<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image"></div>
            <div class="small-images">
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
            </div>
            <div class="info">
                <strong>ELLEN A LYNX STAR</strong><br>
                4. 10. 2011<br>
                černě želvovinová mramorovaná<br> (f 22)<br>
                <strong>Rodokmen</strong><br>
                Matka: Harmony Garfield's Baby<br>
                Otec: Centaur Garfield's Baby<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image"></div>
            <div class="small-images">
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
            </div>
            <div class="info">
                <strong>REBEKA GARFIELD'S BABY</strong><br>
                6. 1. 2012<br>
                černě želvovinová tečkovaná s bílou<br> (f 09 24)<br>
                <strong>Rodokmen</strong><br>
                Matka: CH Embee Garfield's Baby<br>
                Otec: CH Zeus Sante d'Orsy<br>
                <strong>Výstavy:</strong><br> ~ tř. 11 ~<br>
                MVK Lysá nad Labem 24.11.2012 - V3<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image"></div>
            <div class="small-images">
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
            </div>
            <div class="info">
                <strong>MAUGLINA GARFIELD'S BABY</strong><br>
                23. 7. 2011<br>
                černá s bílou (n 09)<br>
                <strong>Rodokmen</strong><br>
                Matka: CH Embee Garfield's Baby<br>
                Otec: CH Alwaro King of Jewel<br>
                <strong>Výstavy:</strong><br> ~ tř. 9 ~<br>
                MVK Příbram 10.6.2012 - CAC<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image"></div>
            <div class="small-images">
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
                <div class="small-image"></div>
            </div>
            <div class="info">
                <strong>CHOPPER GARFIELD'S BABY</strong><br>
                14. 9. 2015<br>
                černá stříbřitá mramorovaná s bílou<br> (ns 09 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: Lukas Baccaracoon<br>
                Matka: Ornela Garfield's Baby<br>
            </div>
        </div>
    </div>

</body>

</html>