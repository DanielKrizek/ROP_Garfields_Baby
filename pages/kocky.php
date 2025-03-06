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
                <strong>OMARION QUEEN OF DAN</strong><br>
                6. 11. 2021<br>
                černě želvovinová stříbřitá mramorovaná<br> (fs 22)<br>
                <strong>Rodokmen</strong><br>
                Matka: Solaris of CaDazz<br>
                Otec: Hope Queen of Dan<br>
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
                <strong>OLIVIA GARFIELD'S BABY</strong><br>
                25. 5. 2021<br>
                černě želvovinová stříbřitá tygrovaná<br> (fs 23)<br>
                <strong>Rodokmen</strong><br>
                Matka: Rebeka Garfield's Baby<br>
                Otec: HoneyDevil Nectarine<br>
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
                <strong>ANGELA GARFIELD'S BABY</strong><br>
                22. 11. 2019<br>
                černá stříbřitá tečkovaná bikolor<br> (ns 03 24)<br>
                <strong>Rodokmen</strong><br>
                Matka: Kisha Garfield's Baby<br>
                Otec: Zuchero A Lynx Star<br>
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
                <strong>QUELLA GARFIELD'S BABY</strong><br>
                14. 3. 2019<br>
                černě želvovinová stříbřitá mramorovaná<br> (fs 22)<br>
                <strong>Rodokmen</strong><br>
                Matka: Mauglina Garfield's Baby<br>
                Otec: Lukas Baccaracoon<br>
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
                <strong>RACHEL GARFIELD'S BABY</strong><br>
                11. 4. 2019<br>
                modře želvovinová stříbřitá mramorovaná s bílou<br> (gs 09 22)<br>
                <strong>Rodokmen</strong><br>
                Matka: Cassandra Garfield's Baby<br>
                Otec: Lukas Baccaracoon<br>
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
                <strong>HANY GARFIELD'S BABY</strong><br>
                5. 7. 2018<br>
                černá s bílou<br> (n 09)<br>
                <strong>Rodokmen</strong><br>
                Matka: Happy Agostino<br>
                Otec: Loki Blue Laguna Leo<br>
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
                <strong>KATELYNN GARFIELD'S BABY</strong><br>
                18. 8. 2018<br>
                černě želvovinová<br> (f)<br>
                <strong>Rodokmen</strong><br>
                Matka: Kamey Garfield's Baby<br>
                Otec: Loki Blue Laguna Leo<br>
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
                <strong>CASSANDRA GARFIELD'S BABY</strong><br>
                6. 12. 2017<br>
                černě želvovinová mramorovaná<br> (f 22)<br>
                <strong>Rodokmen</strong><br>
                Matka: Kisha Garfield's Baby<br>
                Otec: Loki Blue Laguna Leo<br>
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
                <strong>DEBBIE GARFIELD'S BABY</strong><br>
                10. 2. 2018<br>
                modrá mramorovaná<br> (a 22)<br>
                <strong>Rodokmen</strong><br>
                Matka: Queeny Bella A Lynx Star<br>
                Otec: Loki Blue Laguna Leo<br>
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
                <strong>KAMEY GARFIELD'S BABY</strong><br>
                5. 1. 2016<br>
                černě želvovinová stříbřitá mramorovaná s bílou<br> (fs 09 22)<br>
                <strong>Rodokmen</strong><br>
                Matka: Rebeka Garfield's Baby<br>
                Otec: Lukas Baccaracoon<br>
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
                <strong>PADY GARFIELD'S BABY</strong><br>
                21. 9. 2016<br>
                modrá stříbřitá mramorovaná s bílou<br> (as 09 22)<br>
                <strong>Rodokmen</strong><br>
                Matka: Rebeka Garfield's Baby<br>
                Otec: Chopper Garfield's Baby<br>
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
                <strong>HAPPY AGOSTINO</strong><br>
                1. 8. 2016<br>
                černě želvovinová mramorovaná s bílou<br> (f 09 22)<br>
                <strong>Rodokmen</strong><br>
                Matka: IC Arnika of Pumelia Garden<br>
                Otec: IC Alwaro Kent<br>
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
                <strong>KISHA GARFIELD'S BABY</strong><br>
                5. 1. 2016<br>
                černě želvovinová stříbřitá tečkovaná s bílou<br> (fs 09 24)<br>
                <strong>Rodokmen</strong><br>
                Matka: Rebeka Garfield's Baby<br>
                Otec: Lukas Baccaracoon<br>
            </div>
        </div>
    </div>

</body>

</html>