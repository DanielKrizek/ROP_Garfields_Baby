<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "news");
$connUsers = new mysqli("localhost", "root", "", "login");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../../../img/news/";
        $fileName = basename($_FILES['image']['name']);
        $targetFilePath = $uploadDir . $fileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            $image = "../img/news/" . $fileName;
        } else {
            die("Chyba při nahrávání obrázku.");
        }
    } else {
        $image = null; // No image uploaded
    }

    $stmt = $conn->prepare("INSERT INTO news (title, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $image);
    $stmt->execute();

    header("Location: manage_articles.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Přidat článek</title>
</head>

<body>
    <a href="manage_articles.php">Zpět na správu článků</a> <!-- Link back to manage_articles -->
    <h1>Přidat článek</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Název" required><br>
        <textarea name="content" placeholder="Obsah" required></textarea><br>
        <input type="file" name="image" placeholder="Obrázek URL"><br>
        <button type="submit">Přidat</button>
    </form>
</body>

</html>