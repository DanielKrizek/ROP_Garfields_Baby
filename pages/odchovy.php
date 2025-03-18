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
        $batchSize = 26; // Každá řada má 26 vrhů (A-Z)
        $totalBatches = ceil(count($litters) / $batchSize);

        for ($batch = 0; $batch < $totalBatches; $batch++) :
            $start = $batch * $batchSize;
            $end = min(($batch + 1) * $batchSize, count($litters));
        ?>

            <h2><?= ($batch + 1) ?>. řada vrhů</h2>

            <div class="grid">
                <?php for ($i = $start; $i < $end; $i++) :
                    $litterName = htmlspecialchars($litters[$i]['name']);
                    $letter = str_replace("vrh ", "", $litterName); // Extrahuje písmeno
                    $rowNumber = $batch + 1; // Řada začíná od 1

                    // Vytvoří URL ve formátu "odchovy_X_Y.php"
                    $link = "odchovy_{$rowNumber}_{$letter}.php";
                ?>
                    <div class="litter">
                        <h3><?= $litterName ?></h3>
                        <a href="<?= $link ?>">
                            <img src="<?= htmlspecialchars($litters[$i]['image_url']) ?>" alt="<?= $litterName ?>">
                        </a>
                    </div>
                <?php endfor; ?>
            </div>

        <?php endfor; ?>
    </div>

    <div id="imageModal" class="modal">
        <div class="modal-content-wrapper">
            <img class="modal-content" id="modalImage">
        </div>
    </div>

</body>

</html>