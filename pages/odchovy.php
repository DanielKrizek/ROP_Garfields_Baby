<?php
session_start();

include("../php/connection.php");
include("../php/functions.php");

$connUsers = new mysqli("localhost", "root", "", "login");
$conn = new mysqli("localhost", "root", "", "odchovy");

$sql = "SELECT * FROM litters ORDER BY id ASC";
$result = $conn->query($sql);

$litters = [];
while ($row = $result->fetch_assoc()) {
    $litters[] = $row;
}

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
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/odchovy.css">
    <link rel="stylesheet" href="../styles/grid.css">
    <script src="https://unpkg.com/panzoom@9.4.0/dist/panzoom.min.js"></script>
    <script src="../js/hamburger.js" defer></script>
    <script src="../js/script.js" defer></script>
    <script src="../js/modal.js" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const images = document.querySelectorAll(".news-image");
            const modal = document.getElementById("imageModal");
            const modalImg = document.getElementById("modalImage");

            images.forEach(image => {
                image.addEventListener("click", function() {
                    modal.style.display = "block";
                    modalImg.src = this.src;
                    panzoom(modalImg, {
                        maxZoom: 5,
                        minZoom: 1,
                        bounds: true,
                        boundsPadding: 0.1
                    });
                });
            });
        });
    </script>

</head>

<body>
    <header>
        <?php include("navbar.php"); ?>
    </header>

    <?php include("logForm.php"); ?>

    <div class="container">
        <?php
        $currentBatch = null;
        foreach ($litters as $litter) {
            if ($litter['batch_number'] !== $currentBatch) {
                if ($currentBatch !== null) {
                    echo "</div>"; // Uzavření předchozí řady
                }
                echo "<h2>{$litter['batch_number']}. řada vrhů</h2>";
                echo "<div class='grid'>";
                $currentBatch = $litter['batch_number'];
            }

            $litterName = htmlspecialchars($litter['name']);
            $link = "litter_detail.php?id=" . htmlspecialchars($litter['id']);
            echo "<div class='litter'>";
            echo "<h3>{$litterName}</h3>";
            echo "<a href='{$link}'>";
            echo "<img src='" . htmlspecialchars($litter['image_url']) . "' alt='{$litterName}'>";
            echo "</a></div>";
        }

        if (!empty($litters)) {
            echo "</div>"; // Uzavření poslední řady
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