<?php
session_start();

include("../php/connection.php");
include("../php/functions.php");

$conn = new mysqli("localhost", "root", "", "odchovy");

if (isset($_GET['id'])) {
    $litterId = intval($_GET['id']); // Získání ID vrhu z URL

    // Načtení informací o vrhu
    $sqlLitter = "SELECT * FROM litters WHERE id = ?";
    $stmtLitter = $conn->prepare($sqlLitter);
    $stmtLitter->bind_param("i", $litterId);
    $stmtLitter->execute();
    $resultLitter = $stmtLitter->get_result();

    if ($resultLitter->num_rows > 0) {
        $litter = $resultLitter->fetch_assoc();
    } else {
        die(translate('litter_not_found'));
    }

    // Načtení koček pro daný vrh
    $sqlCats = "SELECT * FROM kotata WHERE litter_id = ?";
    $stmtCats = $conn->prepare($sqlCats);
    $stmtCats->bind_param("i", $litterId);
    $stmtCats->execute();
    $resultCats = $stmtCats->get_result();

    $cats = [];
    while ($row = $resultCats->fetch_assoc()) {
        $cats[] = $row;
    }
} else {
    die(translate('litter_id_not_specified'));
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
    <title><?php echo ucfirst(htmlspecialchars($litter['name'])); ?></title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/Header.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/modal.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/odchovy_dynamic.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="https://unpkg.com/panzoom@9.4.0/dist/panzoom.min.js"></script>
    <script src="../js/hamburger.js" defer></script>
    <script src="../js/modal.js" defer></script>
    <script src="../js/script.js" defer></script>
</head>

<body>
    <header>
        <?php include("navbar.php"); ?>
    </header>

    <?php include("logForm.php"); ?>

    <div class="container">
        <a href="odchovy.php" class="back-link"><?php echo translate('back_to_odchovy'); ?></a>
        <h1><?php echo ucfirst(htmlspecialchars($litter['name'])); ?></h1>

        <div class="litter-parents">
            <p><strong><?php echo translate('mother') ?>:</strong> <?php echo htmlspecialchars($litter['mother_name']); ?></p>
            <p><strong><?php echo translate('father') ?>:</strong> <?php echo htmlspecialchars($litter['father_name']); ?></p>
        </div>

        <div class="cat-grid">
            <?php
            if (!empty($cats)) {
                foreach ($cats as $cat) {
                    echo "<div class='cat'>";
                    echo "<h3>" . htmlspecialchars($cat['name']) . "</h3>";
                    // Display description based on selected language
                    $descriptionField = ($_SESSION['lang'] === 'en') ? 'description_en' : 'description';
                    echo "<p><strong>" . translate('color') . ":</strong> " . htmlspecialchars($cat[$descriptionField]) . "</p>";
                    echo "<p><strong>" . translate('ems_code') . ":</strong> " . htmlspecialchars($cat['color_code']) . "</p>";
                    echo "<p><strong>" . translate('status') . ":</strong> <span class='" .
                        (strtolower($cat['status']) === 'volná' ? 'status-available' : 'status-unavailable') .
                        "'>" . htmlspecialchars($cat['status']) . "</span></p>";

                    // Načtení obrázků pro dané kotě
                    $sqlImages = "SELECT * FROM kotata_obrazky WHERE kitten_id = ?";
                    $stmtImages = $conn->prepare($sqlImages);
                    $stmtImages->bind_param("i", $cat['id']);
                    $stmtImages->execute();
                    $resultImages = $stmtImages->get_result();

                    if ($resultImages->num_rows > 0) {
                        echo "<div class='cat-images'>";
                        while ($image = $resultImages->fetch_assoc()) {
                            echo "<img src='" . htmlspecialchars($image['image_url']) . "' alt='Obrázek kočky' class='enlargeable'>";
                        }
                        echo "</div>";
                    } else {
                        echo "<p>" . translate('no_images_found') . "</p>";
                    }

                    echo "</div>";
                }
            } else {
                echo "<p>" . translate('no_cats_found') . "</p>";
            }
            ?>
        </div>

        <div id="imageModal" class="modal">
            <span class="close">&times;</span>
            <div class="modal-content-wrapper">
                <img class="modal-content" id="modalImage">
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const modal = document.getElementById("imageModal");
            const modalImage = document.getElementById("modalImage");
            const closeModal = document.querySelector(".modal .close");

            document.querySelectorAll(".enlargeable").forEach(image => {
                image.addEventListener("click", () => {
                    modal.style.display = "block";
                    modalImage.src = image.src;
                });
            });

            closeModal.addEventListener("click", () => {
                modal.style.display = "none";
            });

            window.addEventListener("click", (event) => {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>