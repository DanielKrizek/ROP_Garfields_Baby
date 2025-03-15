<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "news");
$connUsers = new mysqli("localhost", "root", "", "login");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM news WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    $stmt = $conn->prepare("UPDATE news SET title=?, content=?, image=? WHERE id=?");
    $stmt->bind_param("sssi", $title, $content, $image, $id);
    $stmt->execute();

    header("Location: admin_panel.php");
    exit();
}
?>

<form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required><br>
    <textarea name="content" required><?= htmlspecialchars($row['content']) ?></textarea><br>
    <input type="text" name="image" value="<?= htmlspecialchars($row['image']) ?>"><br>
    <button type="submit">Uložit změny</button>
</form>