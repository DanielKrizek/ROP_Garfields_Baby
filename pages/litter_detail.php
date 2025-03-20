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
        die("Vrh nebyl nalezen.");
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
    die("ID vrhu nebylo specifikováno.");
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
        <h1><?php echo ucfirst(htmlspecialchars($litter['name'])); ?></h1>

        <div class="litter-parents">
            <p><strong>Matka:</strong> <?php echo htmlspecialchars($litter['mother_name']); ?></p>
            <p><strong>Otec:</strong> <?php echo htmlspecialchars($litter['father_name']); ?></p>
        </div>

        <div class="cat-grid">
            <?php
            if (!empty($cats)) {
                foreach ($cats as $cat) {
                    echo "<div class='cat'>";
                    echo "<h3>" . htmlspecialchars($cat['name']) . "</h3>";
                    echo "<p>" . htmlspecialchars($cat['description']) . "</p>";
                    echo "<p><strong>Kód:</strong> " . htmlspecialchars($cat['color_code']) . "</p>";

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
                        echo "<p>Pro toto kotě nebyly nalezeny žádné obrázky.</p>";
                    }

                    echo "</div>";
                }
            } else {
                echo "<p>Pro tento vrh nebyly nalezeny žádné kočky.</p>";
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