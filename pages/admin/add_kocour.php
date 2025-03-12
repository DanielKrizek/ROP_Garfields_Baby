<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "kocicky");
$connUsers = new mysqli("localhost", "root", "", "login");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $birth_date = $_POST['birth_date'];
    $color_pattern = $_POST['color_pattern'];
    $breed_code = $_POST['breed_code'];
    $main_image = $_POST['main_image'];
    $gallery_images = $_POST['gallery_images'];

    $stmt = $conn->prepare("INSERT INTO toms (name, birth_date, color_pattern, breed_code, main_image, gallery_images) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $birth_date, $color_pattern, $breed_code, $main_image, $gallery_images);
    $stmt->execute();

    header("Location: admin_panel.php");
    exit();
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Jméno" required><br>
    <input type="date" name="birth_date" required><br>
    <input type="text" name="color_pattern" placeholder="Barva" required><br>
    <input type="text" name="breed_code" placeholder="Kód plemene" required><br>
    <input type="text" name="main_image" placeholder="Hlavní obrázek URL"><br>
    <input type="text" name="gallery_images" placeholder="Galerie obrázků (oddělené čárkou)"><br>
    <button type="submit">Přidat</button>
</form>