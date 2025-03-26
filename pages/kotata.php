<?php
session_start();

// Nastavení výchozího jazyka, pokud není nastaven
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'cs'; // cs pro češtinu, en pro angličtinu
}

include("../php/connection.php");
include("../php/functions.php");

$conn = new mysqli("localhost", "root", "", "odchovy");
$connUsers = new mysqli("localhost", "root", "", "login");

$kotata = [];
$defaultKotata = [];

// Fetch all kittens with status "VOLNÁ" by default
$stmt = $conn->prepare("
    SELECT k.id AS kitten_id, k.name, k.color_code, k.status, 
           " . ($_SESSION['lang'] == 'en' ? "k.description_en" : "k.description") . " AS description, 
           ko.image_url, l.batch_number, l.name AS litter_name
    FROM kotata k
    LEFT JOIN kotata_obrazky ko ON k.id = ko.kitten_id
    LEFT JOIN litters l ON k.litter_id = l.id
    WHERE k.status = 'VOLNÁ'
");
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $defaultKotata[$row['kitten_id']]['details'] = [
        'name' => $row['name'],
        'color_code' => $row['color_code'],
        'status' => $row['status'],
        'description' => $row['description'],
        'batch_number' => $row['batch_number'],
        'litter_name' => $row['litter_name']
    ];
    $defaultKotata[$row['kitten_id']]['images'][] = $row['image_url'];
}
$stmt->close();

// Načtení vyhledávacího kritéria z URL, pokud existuje
if (isset($_GET['search'])) {
    $_SESSION['search_color_code'] = $_GET['search'];
    $color_code = $_GET['search'];

    // Proveďte vyhledávání
    $stmt = $conn->prepare("
        SELECT k.id AS kitten_id, k.name, k.color_code, k.status, 
               " . ($_SESSION['lang'] == 'en' ? "k.description_en" : "k.description") . " AS description, 
               ko.image_url, l.batch_number, l.name AS litter_name
        FROM kotata k
        LEFT JOIN kotata_obrazky ko ON k.id = ko.kitten_id
        LEFT JOIN litters l ON k.litter_id = l.id
        WHERE k.color_code LIKE ?
    ");
    $searchTerm = "%" . $color_code . "%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    $kotata = [];
    while ($row = $result->fetch_assoc()) {
        $kotata[$row['kitten_id']]['details'] = [
            'name' => $row['name'],
            'color_code' => $row['color_code'],
            'status' => $row['status'],
            'description' => $row['description'],
            'batch_number' => $row['batch_number'],
            'litter_name' => $row['litter_name']
        ];
        $kotata[$row['kitten_id']]['images'][] = $row['image_url'];
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['search'])) {
        $color_code = $_POST['color_code'];
        $_SESSION['search_color_code'] = $color_code; // Uložení do session
        header("Location: " . $_SERVER['PHP_SELF'] . "?search=" . urlencode($color_code));
        exit();
    } elseif (isset($_POST['reset'])) {
        unset($_SESSION['search_color_code']); // Smazání z session
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['lang-select'])) {
        $_SESSION['lang'] = $_POST['lang-select'];
        $redirectUrl = $_SERVER['PHP_SELF'];
        if (isset($_SESSION['search_color_code'])) {
            $redirectUrl .= "?search=" . urlencode($_SESSION['search_color_code']);
        }
        header("Location: " . $redirectUrl);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo translate('kitten_search_title'); ?></title>
    <link rel="icon" type="image/x-icon" href="../svg/logo.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/Header.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/grid.css">
    <link rel="stylesheet" href="../styles/modal.css">
    <link rel="stylesheet" href="../styles/search.css">
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

    <main>
        <h1><?php echo translate('kitten_search_heading'); ?></h1>
        <form method="POST" class="search-form">
            <label for="color_code"><?php echo translate('ems_code'); ?>:</label>
            <input type="text" id="color_code" name="color_code" placeholder="<?php echo translate('enter_ems_code'); ?>" value="<?= isset($_SESSION['search_color_code']) ? htmlspecialchars($_SESSION['search_color_code']) : '' ?>">
            <p class="info-link" id="colorCodeInfo"><?php echo translate('color_code_info'); ?></p>
            <button type="submit" name="search"><?php echo translate('search_button'); ?></button>
            <button type="submit" class="reset" name="reset"><?php echo translate('reset_button'); ?></button>
        </form>

        <div id="infoModal" class="modal">
            <span class="close">&times;</span>
            <div class="modal-content-wrapper">
                <div class="modal-contenter">
                    <h2><?php echo translate('color_codes_title'); ?></h2>
                    <p><?php echo translate('color_codes_description'); ?></p>
                    <ul>
                        <li><strong class="color-code" data-color="n">n</strong> <?php echo translate('color_black'); ?></li>
                        <li><strong class="color-code" data-color="ns">ns</strong> <?php echo translate('color_black_silver'); ?></li>
                        <li><strong class="color-code" data-color="a">a</strong> <?php echo translate('color_blue'); ?></li>
                        <li><strong class="color-code" data-color="as">as</strong> <?php echo translate('color_blue_silver'); ?></li>
                        <li><strong class="color-code" data-color="d">d</strong> <?php echo translate('color_red'); ?></li>
                        <li><strong class="color-code" data-color="ds">ds</strong> <?php echo translate('color_red_silver'); ?></li>
                        <li><strong class="color-code" data-color="e">e</strong> <?php echo translate('color_cream'); ?></li>
                        <li><strong class="color-code" data-color="es">es</strong> <?php echo translate('color_cream_silver'); ?></li>
                        <li><strong class="color-code" data-color="f">f</strong> <?php echo translate('color_tortie'); ?></li>
                        <li><strong class="color-code" data-color="fs">fs</strong> <?php echo translate('color_tortie_silver'); ?></li>
                        <li><strong class="color-code" data-color="g">g</strong> <?php echo translate('color_blue_tortie'); ?></li>
                        <li><strong class="color-code" data-color="gs">gs</strong> <?php echo translate('color_blue_tortie_silver'); ?></li>
                    </ul>
                    <p><?php echo translate('color_code_silver_explanation'); ?></p>
                    <h2><?php echo translate('exterior_codes_title'); ?></h2>
                    <ul>
                        <li><strong class="color-code" data-color="03">03</strong> <?php echo translate('exterior_bicolor'); ?></li>
                        <li><strong class="color-code" data-color="22">22</strong> <?php echo translate('exterior_marble'); ?></li>
                        <li><strong class="color-code" data-color="09">09</strong> <?php echo translate('exterior_white_spots'); ?></li>
                        <li><strong class="color-code" data-color="23">23</strong> <?php echo translate('exterior_tabby'); ?></li>
                        <li><strong class="color-code" data-color="24">24</strong> <?php echo translate('exterior_spotted'); ?></li>
                    </ul>
                    <h3><?php echo translate('examples_title'); ?></h3>
                    <p><strong><?php echo translate('example_1'); ?>:</strong> <code>d22</code> <?php echo translate('example_1_description'); ?></p>
                    <p><strong><?php echo translate('example_2'); ?>:</strong> <code>ds0922</code> <?php echo translate('example_2_description'); ?></p>
                    <p><strong><?php echo translate('example_3'); ?>:</strong> <code>0922</code> <?php echo translate('example_3_description'); ?></p>
                </div>
            </div>
        </div>

        <?php if (!empty($kotata)): ?>
            <div class="results">
                <h2 class="vysledky"><?php echo translate('kittens_with_ems_code'); ?>: <?= isset($_SESSION['search_color_code']) ? htmlspecialchars($_SESSION['search_color_code']) : '' ?></h2>
                <?php foreach ($kotata as $kitten): ?>
                    <div class="kitten-box">
                        <h3><?= htmlspecialchars($kitten['details']['name']) ?></h3>
                        <p><strong><?php echo translate('ems_code'); ?>:</strong> <?= htmlspecialchars($kitten['details']['color_code']) ?></p>
                        <p><strong><?php echo translate('color'); ?>:</strong> <?= htmlspecialchars($kitten['details']['description']) ?></p>
                        <p>
                            <strong><?php echo translate('status'); ?>:</strong>
                            <span class="<?= $kitten['details']['status'] === 'VOLNÁ' ? 'status-green' : 'status-red' ?>">
                                <?= htmlspecialchars($kitten['details']['status']) ?>
                            </span>
                        </p>
                        <p><strong><?php echo translate('litter'); ?>:</strong> <?= htmlspecialchars($kitten['details']['litter_name']) ?></p>
                        <p><strong><?php echo translate('batch_number'); ?>:</strong> <?= htmlspecialchars($kitten['details']['batch_number']) ?></p>
                        <div class="kitten-images">
                            <?php foreach ($kitten['images'] as $image_url): ?>
                                <?php if (!empty($image_url)): ?>
                                    <img src="<?= htmlspecialchars($image_url) ?>" alt="Obrázek koťátka" class="kitten-image enlargeable">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="results">
                <h2 class="vysledky"><?php echo translate('available_kittens'); ?></h2>
                <?php foreach ($defaultKotata as $kitten): ?>
                    <div class="kitten-box">
                        <h3><?= htmlspecialchars($kitten['details']['name']) ?></h3>
                        <p><strong><?php echo translate('ems_code'); ?>:</strong> <?= htmlspecialchars($kitten['details']['color_code']) ?></p>
                        <p><strong><?php echo translate('color'); ?>:</strong> <?= htmlspecialchars($kitten['details']['description']) ?></p>
                        <p>
                            <strong><?php echo translate('status'); ?>:</strong>
                            <span class="<?= $kitten['details']['status'] === 'VOLNÁ' ? 'status-green' : 'status-red' ?>">
                                <?= htmlspecialchars($kitten['details']['status']) ?>
                            </span>
                        </p>
                        <p><strong><?php echo translate('litter'); ?>:</strong> <?= htmlspecialchars($kitten['details']['litter_name']) ?></p>
                        <p><strong><?php echo translate('batch_number'); ?>:</strong> <?= htmlspecialchars($kitten['details']['batch_number']) ?></p>
                        <div class="kitten-images">
                            <?php foreach ($kitten['images'] as $image_url): ?>
                                <?php if (!empty($image_url)): ?>
                                    <img src="<?= htmlspecialchars($image_url) ?>" alt="Obrázek koťátka" class="kitten-image enlargeable">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content-wrapper">
            <img class="modal-content" id="modalImage">
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

            const infoModal = document.getElementById("infoModal");
            const colorCodeInfo = document.getElementById("colorCodeInfo");

            colorCodeInfo.addEventListener("click", () => {
                infoModal.style.display = "block";
            });

            infoModal.querySelector(".close").addEventListener("click", () => {
                infoModal.style.display = "none";
            });

            window.addEventListener("click", (event) => {
                if (event.target === infoModal) {
                    infoModal.style.display = "none";
                }
            });

            document.querySelectorAll(".color-code").forEach(colorCode => {
                colorCode.addEventListener("click", () => {
                    document.getElementById("color_code").value = colorCode.dataset.color;
                    infoModal.style.display = "none";
                });
            });
        });
    </script>
</body>

</html>