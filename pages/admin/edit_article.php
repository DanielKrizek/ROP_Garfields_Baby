<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "news");
$id = $_GET['id'];
$query = "SELECT * FROM news WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

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

            // Delete the old image file
            $oldFilePath = "../../" . $article['image'];
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        } else {
            die("Chyba při nahrávání obrázku.");
        }
    } else {
        $image = $article['image']; // Keep the existing image if no new image is uploaded
    }

    $stmt = $conn->prepare("UPDATE news SET title = ?, content = ?, image = ? WHERE id = ?");
    $stmt->bind_param("sssi", $title, $content, $image, $id);
    $stmt->execute();

    header("Location: manage_articles.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Upravit článek</title>
</head>

<body>
    <a href="manage_articles.php">Zpět na správu článků</a> <!-- Link back to manage_articles -->
    <h1>Upravit článek</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="title" value="<?= htmlspecialchars($article['title']) ?>" required><br>
        <textarea name="content" required><?= htmlspecialchars($article['content']) ?></textarea><br>
        <input type="file" name="image" accept="image/*"><br>
        <?php if ($article['image']): ?>
            <img src="../../<?= htmlspecialchars($article['image']) ?>" alt="Obrázek článku" width="100">
        <?php endif; ?>
        <br>
        <button type="submit">Uložit změny</button>
    </form>
</body>

</html>