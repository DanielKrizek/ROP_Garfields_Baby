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
    $image = $_POST['image'];

    $stmt = $conn->prepare("INSERT INTO news (title, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $image);
    $stmt->execute();

    header("Location: admin_panel.php");
    exit();
}
?>

<form method="POST">
    <input type="text" name="title" placeholder="Název" required><br>
    <textarea name="content" placeholder="Obsah" required></textarea><br>
    <input type="text" name="image" placeholder="Obrázek URL"><br>
    <button type="submit">Přidat</button>
</form>