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
                <img src="../img/castrates/zucchero_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/zucchero_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/zucchero_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/zucchero_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/zucchero_05.jpg" alt="kocka" class="enlargeable"></div>
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
            <div class="big-image">
                <img src="../img/castrates/loki_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/loki_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/loki_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/loki_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/loki_05.jpg" alt="kocka" class="enlargeable"></div>
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
            <div class="big-image">
                <img src="../img/castrates/lukas_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/lukas_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/lukas_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/lukas_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/lukas_05.jpg" alt="kocka" class="enlargeable"></div>
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
            <div class="big-image">
                <img src="../img/castrates/queeny_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/queeny_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/queeny_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/queeny_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/queeny_05.jpg" alt="kocka" class="enlargeable"></div>
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
            <div class="big-image">
                <img src="../img/castrates/ellen_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/ellen_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/ellen_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/ellen_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/ellen_05.jpg" alt="kocka" class="enlargeable"></div>
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
            <div class="big-image">
                <img src="../img/castrates/rebeka_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/rebeka_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/rebeka_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/rebeka_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/rebeka_05.jpg" alt="kocka" class="enlargeable"></div>
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
            <div class="big-image">
                <img src="../img/castrates/mauglina_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/mauglina_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/mauglina_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/mauglina_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/mauglina_05.jpg" alt="kocka" class="enlargeable"></div>
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
            <div class="big-image">
                <img src="../img/castrates/chopper_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/chopper_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/chopper_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/chopper_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/chopper_05.jpg" alt="kocka" class="enlargeable"></div>
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

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/emphaty_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/emphaty_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/emphaty_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/emphaty_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/emphaty_05.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>CH EMPHATY GARFIELD'S BABY</strong><br>
                19. 7. 2009<br>
                černě želvovinová tygrovaná<br> (f 23)<br>
                <strong>Rodokmen</strong><br>
                Matka: CH Dynamite of Rainbow Valley<br>
                Otec: CH Iris of Pumelia Garden<br>
                <strong>Výstavy:</strong><br>
                ~ tř. 11 ~ <br>MVK PYRAMIDA Praha 20.3.2010 - V1<br>
                ~ tř. 9 ~ <br>MVK Praha 31.7.2010 - CAC<br>
                MVK Pardubice 14.11.2010 - V2<br>
                MVK Praha 16.1.2011 - CAC, nominace BIS<br>
                MVK Praha 22.1.2012 - V1 CAC<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/osiris_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/osiris_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/osiris_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/osiris_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/osiris_05.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>OSIRIS GARFIELD'S BABY</strong><br>
                1. 8. 2011<br>
                černě želvovinová stříbřitá tečkovaná s bílou<br> (fs 09 24)<br>
                <strong>Rodokmen</strong><br>
                Matka: CH Empathy Garfield's Baby<br>
                Otec: CH Alwaro King of Jewel<br>
                <strong>Výstavy:</strong><br>
                ~ tř. 9 ~<br> MVK Příbram 10.6.2012 - V2<br>
            </div>
        </div>
        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/ornela_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/ornela_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/ornela_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/ornela_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/ornela_05.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>ORNELA GARFIELD'S BABY</strong><br>
                1. 8. 2011<br>
                černě želvovinová stříbřitá mramorovaná s bílou<br> (fs 09 22)<br>
                <strong>Rodokmen</strong><br>
                Matka: CH Empathy Garfield's Baby<br>
                Otec: CH Alwaro King of Jewel<br>
                <strong>Výstavy:</strong><br>
                ~ tř. 9 ~<br> MVK Praha 29.7.2012 - CAC<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/schery_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/schery_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/schery_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/schery_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/schery_05.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>SCHERY GARFIELD'S BABY</strong><br>
                30. 12. 2016<br>
                černá stříbřitá tečkovaná<br> (ns 24)<br>
                <strong>Rodokmen</strong><br>
                Matka: CH Empathy Garfield's Baby<br>
                Otec: Chopper Garfield's Baby<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/elis_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/elis_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/elis_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/elis_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/elis_05.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>ELIS GARFIELD'S BABY</strong><br>
                12. 2. 2018<br>
                černá mramorovaná<br> (n 22)<br>
                <strong>Rodokmen</strong><br>
                Matka: Rebeka Garfield's Baby<br>
                Otec: Loki Blue Laguna Leo<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/ajsa_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/ajsa_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/ajsa_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/ajsa_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/ajsa_05.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>ICH AJŠA GARFIELD'S BABY</strong><br>
                20. 6. 2008<br>
                červená stříbřitá mramorovaná<br> (ds 22)<br>
                <strong>Rodokmen</strong><br>
                Matka: Amia Magic Magpie<br>
                Otec: CH Iris of Pumelia Garden<br>
                <strong>Výstavy:</strong><br>
                ~ tř. 9 ~ <br>MVK STAR SHOW Praha 14.2.2010 - CAC<br>
                MVK Manětín 28.2.2010 - V1 CAC<br>
                MVK PYRAMIDA Praha 20.3.2010 - V1 CAC<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/cleo_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/cleo_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/cleo_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/cleo_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/cleo_05.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>CLEO WILD ROSE</strong><br>
                20. 9. 2011<br>
                modrá <br>(a)<br>
                <strong>Rodokmen</strong><br>
                Otec: CH Edgar North Beauty<br>
                Matka: CH Felicie Snow Garden<br>
                <strong>Výstavy:</strong><br>
                ~ tř. 9 ~ <br>MVK Praha 29.7.2012 - CAC BIV Nominace BIS<br>
                MVK Lysá nad Labem 24.11.2012 - CAC BIV<br>
                MVK Lysá nad Labem 25.11.2012 - CAC<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/iris_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/iris_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/iris_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/iris_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/iris_02.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>CH IRIS OF PUMELIA GARDEN</strong><br>
                5. 8. 2006<br>
                červený mramorovaný<br> (d 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: CH Elliot de Axis Star<br>
                Matka: Evening Sun of Pumelia Garden<br>
                <strong>Výstavy:</strong><br>
                ~ tř. 11 ~<br> MVK Praha 18.2.2007 - V1 BIV Nom.<br>
                ~ tř. 9 ~<br> MVK Ústí n/L 14.7.2007 - CAC<br>
                MVK Liberec 29.9.2007 - V2<br>
                MVK Praha 16.2.2008 - CAC<br>
                MVK Praha 14.2.2009 - V2<br>
                MVK Praha 22.3.2009 - CAC BIV Nom.<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/david_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/david_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/david_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/david_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/david_02.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>CH DAVID GOLIATH OF PÁBENÍ</strong><br>
                23. 3. 2007<br>
                modrý mramorovaný<br> (a 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: IC Dragon Main Bastet<br>
                Matka: Patricie of Gentle Lions<br>
                <strong>Výstavy:</strong><br>
                ~ tř. 9 ~<br> MVK Praha 16.2.2008 - CAC<br>
                MVK Praha 14.2.2009 - V2<br>
                MVK Praha 22.3.2009 - V2<br>
                MVK Zdice 7.6.2009 - CAC<br>
                MVK Ústí n/L 12.7.2009 - CAC<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/king_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/king_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/king_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/king_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/king_03.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>CH ALWARO KING OF JEVEL</strong><br>
                8. 3. 2010<br>
                černý stříbřitý mramorovaný s bílou<br> (ns 09 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: INT CH Wytopitlock H'Bono Madox<br>
                Matka: Alwaro Victoria<br>
                <strong>Výstavy:</strong><br>
                ~ tř. 11 ~ <br>MVK Praha 17.10.2010 V1<br>
                ~ tř. 9 ~<br> MVK Praha 15.1.2011 - CAC<br>
                MVK Praha 16.1.2011 - CAC<br>
                MVK Praha 12.2.2011 - CAC<br>
                ~ champion ~<br>MVK Praha 13.2.2011 - CACIB<br>
                MVK Bratislava 13.3.2011 - CACIB BIV<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/merlin_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/merlin_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/merlin_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/merlin_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/merlin_05.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>MERLIN OF PUMELIA GARDEN</strong><br>
                2. 2. 2011<br>
                modrá mramorovaná s bílou <br>(a 09 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: Zeus Sante d'Orsy<br>
                Matka: Christine Garfield's Baby<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/arleta_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/arleta_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/arleta_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/arleta_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/arleta_05.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>ARLETA GARFIELD'S BABY</strong><br>
                20. 6. 2008<br>
                červená stříbřitá mramorovaná<br> (ds 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: CH Iris of Pumelia Garden<br>
                Matka: Amia Magic Magpie<br>
                <strong>Výstavy:</strong><br>
                ~ tř. 9 ~<br> MVK Praha 13.12.2009 - V2<br>
                MVK Praha 1.8.2010 - V2<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/amia_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/amia_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/amia_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/amia_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/amia_05.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>AMIA MAGIC MAGPIE</strong><br>
                18. 10. 2006<br>
                červená stříbřitá mramorovaná bikolor<br> (ds 03 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: CH Kelvin Klein z Larku<br>
                Matka: Bianca Sante D'Orsy<br>
                <strong>Výstavy:</strong><br>
                ~ tř. 9 ~<br> MVK Liberec 29.9.2007 - CAC<br>
                MVK Praha 17.10.2009 - V2<br>
                MVK Příbram 5.6.2010 - CAC<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/arka_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/arka_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/arka_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/arka_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/arka_05.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>CH ARKA GARFIELD'S BABY</strong><br>
                20. 6. 2008<br>
                červená stříbřitá mramorovaná s bílou<br> (ds 09 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: CH Iris of Pumelia Garden<br>
                Matka: Amia Magic Magpie<br>
                <strong>Výstavy:</strong><br>
                ~ tř. 9 ~ <br>MVK Most 17.5.2009 - CAC Nom.<br>
                MVK Zdice 7.6.2009 - CAC<br>
                MVK Ústí n/L 12.7.2009 - V2<br>
                MVK Pardubice 15.11.2009 - CAC<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/xtreme_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/xtreme_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/xtreme_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/xtreme_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/xtreme_05.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>CH X-TREME Z MATRIXU</strong><br>
                23. 12. 2008<br>
                modře želvovinová mramorovaná<br> (g 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: CH Eomer of Blooming Tree<br>
                Matka: Penelope Hairy Majesty<br>
                <strong>Výstavy:</strong><br>
                ~ tř. 9 ~<br> MVK Pardubice 15.11.2009 - CAC<br>
                MVK Praha 13.12.2009 - CAC BIV<br>
                MVK Manětín 28.2.2010 - V2<br>
                MVK Lysá nad Labem 26.11.2011 - V1 CAC<br>
            </div>
        </div>

        <div class="block">
            <div class="big-image">
                <img src="../img/castrates/avalon_01.jpg" alt="kocka" class="enlargeable">
            </div>
            <div class="small-images">
                <div class="small-image"><img src="../img/castrates/avalon_02.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/avalon_03.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/avalon_04.jpg" alt="kocka" class="enlargeable"></div>
                <div class="small-image"><img src="../img/castrates/avalon_05.jpg" alt="kocka" class="enlargeable"></div>
            </div>
            <div class="info">
                <strong>AVALON OF MASSLCATS</strong><br>
                23. 12. 2013<br>
                černá stříbřitá mramorovaná <br>(ns 22)<br>
                <strong>Rodokmen</strong><br>
                Otec: CH Top Coon Ayron<br>
                Matka: IC Felis Admiranda Bastilla<br>
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