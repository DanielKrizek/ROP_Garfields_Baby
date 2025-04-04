<?php
session_start();
include("../../php/connection.php");
include("../../php/functions.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/x-icon" href="../svg/logo.svg">
    <title>Admin Panel</title>
</head>

<body>
    <h1>Admin Panel</h1>
    <a href="../../index.php">Zpět na hlavní stránku</a>
    <ul>
        <li><a href="manage_castrates.php">Správa kastrátů</a></li>
        <li><a href="manage_cats.php">Správa koček</a></li>
        <li><a href="manage_toms.php">Správa kocourů</a></li>
        <li><a href="manage_articles.php">Správa článků</a></li>
        <li><a href="manage_litters.php">Správa odchovů</a></li>
        <li><a href="manage_kittens.php">Správa koťat</a></li>
        <li><a href="manage_kitten_images.php">Správa obrázků koťat</a></li>
    </ul>
</body>

</html>