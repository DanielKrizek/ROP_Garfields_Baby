<?php
session_start();

include("../php/connection.php");
include("../php/functions.php");

$conn = new mysqli("localhost", "root", "", "news");
$connUsers = new mysqli("localhost", "root", "", "login");

$query = "SELECT * FROM news ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

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
    <link rel="icon" type="image/x-icon" href="../svg/logo.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/Header.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/modal.css">
    <link rel="stylesheet" href="../styles/news.css">
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


    <main>
        <section class="news-container">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <article class="news-item">
                    <?php
                    // Zjištění jazyka a výběr příslušného titulku a obsahu
                    $title = ($_SESSION['lang'] == 'en') ? $row['title_en'] : $row['title'];
                    $content = ($_SESSION['lang'] == 'en') ? $row['content_en'] : $row['content'];
                    ?>
                    <h3><?php echo htmlspecialchars($title); ?></h3>
                    <?php
                    if (!empty($row['image'])) {
                        $images = explode(',', $row['image']);
                        foreach ($images as $image):
                    ?>
                            <img src="<?php echo htmlspecialchars(trim($image)); ?>" alt="Obrázek k novince" class="news-image">
                    <?php
                        endforeach;
                    }
                    ?>
                    <p><?php echo nl2br(htmlspecialchars($content)); ?></p>
                    <small><?php echo date("d.m.Y", strtotime($row['created_at'])); ?></small>
                </article>
            <?php endwhile; ?>
        </section>
    </main>


    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content-wrapper">
            <img class="modal-content" id="modalImage">
        </div>
    </div>

</body>

</html>