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
    <link rel="icon" type="image/x-icon" href="../svg/logo.svg">
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
            <h2><?php echo translate('contact'); ?></h2>
            <p><?php echo translate('contact_info'); ?></p>
            <ul>
                <li><strong><?php echo translate('contact_name'); ?></strong> Zdenka Cerhová</li>
                <li><strong><?php echo translate('contact_address'); ?></strong> Zbožíčko 71, Straky</li>
                <li><strong><?php echo translate('contact_phone'); ?></strong> 603 285 744</li>
                <li><strong>Email:</strong> <a href="mailto:garfieldsbaby@seznam.cz">garfieldsbaby@seznam.cz</a></li>
            </ul>

            <div class="social-icons">
                <div class="social-item">
                    <img src="../svg/instagram.jpg" alt="Instagram" class="social-icon">
                    <a href="https://www.instagram.com/garfieldsbaby.cz/" target="_blank">https://www.instagram.com/garfieldsbaby.cz/</a>
                </div>
                <div class="social-item">
                    <img src="../svg/facebook.png" alt="Facebook" class="social-icon">
                    <a href="https://www.facebook.com/garfieldsbaby/" target="_blank">https://www.facebook.com/garfieldsbaby/</a>
                </div>
            </div>

            <div id="map" style="height: 400px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);"></div>
        </div>
    </main>

    <?php if (isset($_SESSION['form_success'])): ?>
        <div class="alert success" id="success-alert">
            <?php echo $_SESSION['form_success'];
            unset($_SESSION['form_success']); ?>
        </div>
    <?php elseif (isset($_SESSION['form_error'])): ?>
        <div class="alert error">
            <?php echo $_SESSION['form_error'];
            unset($_SESSION['form_error']); ?>
        </div>
    <?php endif; ?>


    <?php
    if (!isset($_SESSION['user_id'])) {
        echo "<p class='not-logged-in-message'>" . translate('contact_notLogged_message') . "</p>";
    } else {
    ?>
        <section class="contact-form">
            <h3><?php echo translate('contact_form'); ?></h3>
            <form action="../php/odeslaneKontakty.php" method="POST" id="contact-form">
                <div class="form-group">
                    <label for="name"><?php echo translate('contact_name'); ?></label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message"><?php echo translate('contact_message'); ?>:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-button"><?php echo translate('contact_submit'); ?></button>
            </form>

        </section>
    <?php
    }
    ?>

    <script>
        var map = L.map('map').setView([50.229395118938044, 14.936214192828764], 20);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        L.marker([50.229395118938044, 14.936214192828764]).addTo(map)
            .bindPopup('Zbožíčko 71, 289 25 Zbožíčko')
            .openPopup();
    </script>

    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const successAlert = document.getElementById('success-alert');
            if (successAlert) {
                setTimeout(() => {
                    successAlert.style.display = 'none';
                }, 5000);
            }
        });
    </script>

    <script>
        document.getElementById('contact-form').addEventListener('submit', function(event) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();

            if (!name || !email || !message) {
                alert("Všechna pole jsou povinná.");
                event.preventDefault();
            }

            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                alert("Zadejte platnou emailovou adresu.");
                event.preventDefault();
            }
        });
    </script>

</body>

</html>