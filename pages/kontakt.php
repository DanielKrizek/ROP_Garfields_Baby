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
    <link rel="stylesheet" href="../styles/contact.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="../js/hamburger.js" defer></script>
    <script src="../js/script.js" defer></script>
</head>

<body>
    <header>
        <?php include("navbar.php"); ?>
    </header>

    <?php include("logForm.php"); ?>

    <main>
        <div class="description">
            <h2>Kontakt</h2>
            <p>Máte-li jakékoli dotazy nebo potřebujete více informací, neváhejte nás kontaktovat. Rádi vám pomůžeme.</p>
            <ul>
                <li><strong>Jméno:</strong> Zdenka Cerhová</li>
                <li><strong>Adresa:</strong> Zbožíčko 71, Straky</li>
                <li><strong>Telefon:</strong> 603 285 744</li>
                <li><strong>Email:</strong> <a href="mailto:garfieldsbaby@seznam.cz">garfieldsbaby@seznam.cz</a></li>
            </ul>
            <div id="map" style="height: 400px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);"></div>
        </div>
    </main>

    <script>
        var map = L.map('map').setView([50.229395118938044, 14.936214192828764], 20);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        L.marker([50.229395118938044, 14.936214192828764]).addTo(map)
            .bindPopup('Zbožíčko 71, 289 25 Zbožíčko')
            .openPopup();
    </script>
</body>

</html>