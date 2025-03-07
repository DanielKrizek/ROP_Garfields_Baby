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
    <link rel="stylesheet" href="../styles/modal.css">
    <script src="https://unpkg.com/panzoom@9.4.0/dist/panzoom.min.js"></script>
    <script src="../js/hamburger.js" defer></script>
    <script src="../js/script.js" defer></script>
    <script src="../js/modal.js" defer></script>
</head>

<body>
    <header>
        <?php include("navbar.php"); ?>
    </header>


    <?php include("logForm.php"); ?>


    <div class="blocks-row">
        <div class="block">
            <div class="big-image">
                <img src="../img/toms/kristian_01.jpg" alt="kristian" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/toms/kristian_02.jpg" alt="kristian" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/kristian_03.jpg" alt="kristian" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/kristian_04.jpg" alt="kristian" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/kristian_05.jpg" alt="kristian" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>KRISTIAN A LYNX STAR</strong><br>
                27. 8. 2023<br>
                černá stříbřitá mramorovaná s bílou<br> (ns 09 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: Alwaro Safari Wind<br>
                Matka: Raffaella Noblesse<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/toms/samurai_01.jpg" alt="samurai" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/toms/samurai_02.jpg" alt="samurai" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/samurai_03.jpg" alt="samurai" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/samurai_04.jpg" alt="samurai" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/samurai_05.jpg" alt="samurai" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>SAMURAI OXYMORON</strong><br>
                1. 3. 2021<br>
                bílá s modrýma očima<br> (w 61)<br>
                <strong>Rodokmen</strong><br>
                Otec: Poseidon Oxymoron<br>
                Matka: Mainelynx Fawnia<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/toms/hope_01.jpg" alt="hope" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/toms/hope_02.jpg" alt="hope" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/hope_03.jpg" alt="hope" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/hope_04.jpg" alt="hope" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/hope_05.jpg" alt="hope" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>HOPE GARFIELD'S BABY</strong><br>
                8. 8. 2020<br>
                červená stříbřitá mramorovaná s bílou<br> (ds 09 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: Zuchero A Lynx Star<br>
                Matka: Happy Agostino<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/toms/mario_01.jpg" alt="mario" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/toms/mario_02.jpg" alt="mario" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/mario_03.jpg" alt="mario" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/mario_04.jpg" alt="mario" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/mario_05.jpg" alt="mario" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>MARIO NOBLESSE A LYNX STAR</strong><br>
                20. 8. 2020<br>
                modrá mramorovaná s bílou<br> (a 09 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: Pillowtalk's Michigan<br>
                Matka: Katherine Kerry A Lynx Star<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/toms/honeydevil_01.jpg" alt="honeydevil" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/toms/honeydevil_02.jpg" alt="honeydevil" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/honeydevil_03.jpg" alt="honeydevil" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/honeydevil_04.jpg" alt="honeydevil" class="enlargeable"></div>
                <div class="small-image"><img src="../img/toms/honeydevil_05.jpg" alt="honeydevil" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>HONEYDEVIL NECTARINE</strong><br>
                26. 6. 2019<br>
                červená stříbřitá ticked<br> (ds 25)<br>
                <strong>Rodokmen</strong><br>
                Otec: ICH Respectcoon Sunshine Grand<br>
                Matka: HoneyDevil Torry Red<br>
            </div>
        </div>
    </div>

    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content-wrapper">
            <img class="modal-content" id="modalImage">
        </div>
    </div>

</body>

</html>