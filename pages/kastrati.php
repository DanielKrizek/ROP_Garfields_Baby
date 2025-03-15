<?php
session_start(); // Musí být úplně první

include("../php/connection.php");
include("../php/functions.php");


$conn = new mysqli("localhost", "root", "", "kocicky");
$connUsers = new mysqli("localhost", "root", "", "login");


if ($connUsers->connect_error) {
    die("Chyba připojení: " . $connUsers->connect_error);
}

// Zpracování přihlášení, registrace a výběru jazyka
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $error = login($connUsers, $username, $password);
    } elseif (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $message = signup($connUsers, $username, $password);
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
        <?php
        // Dotaz na kočky z databáze
        $query = "SELECT * FROM castrates";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $images = explode(',', $row['gallery_images']); // Rozdělení obrázků na pole

            echo '<div class="block">';
            echo '    <div class="big-image">';
            echo '        <img src="' . $row['main_image'] . '" alt="' . $row['name'] . '" class="enlargeable">';
            echo '    </div>';
            echo '    <div class="small-images">';
            foreach ($images as $image) {
                echo '        <div class="small-image"><img src="' . $image . '" alt="' . $row['name'] . '" class="enlargeable"></div>';
            }
            echo '    </div>';
            echo '    <div class="info">';
            echo '        <strong>' . $row['name'] . '</strong><br>';
            echo '        ' . date('j. n. Y', strtotime($row['birth_date'])) . '<br>';
            echo '        ' . $row['color_pattern'] . '<br> (' . $row['breed_code'] . ')<br>';
            echo '        <strong>Rodokmen</strong><br>';
            echo '        Matka: ' . $row['mother'] . '<br>';
            echo '        Otec: ' . $row['father'] . '<br>';

            // Zobrazit výstavy, pokud existují
            if (!empty($row['exhibitions'])) {
                echo '        <strong>Výstavy:</strong><br>';
                echo '        ' . nl2br($row['exhibitions']) . '<br>'; // Použití nl2br pro zobrazení nových řádků
            }

            echo '    </div>';
            echo '</div>';
        }
        ?>
    </div>

    <div id="imageModal" class="modal">
        <div class="modal-content-wrapper">
            <img class="modal-content" id="modalImage">
        </div>
    </div>

</body>

</html>