<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "odchovy");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $color_pattern = $_POST['description'];
    $color_code = $_POST['color_code'];

    $stmt = $conn->prepare("INSERT INTO kotata (name, color_code, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $description, $color_code);
    $stmt->execute();

    header("Location: manage_kittens.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Přidat kotě</title>
</head>

<body>
    <a href="manage_kittens.php">Zpět na správu koťat</a>
    <h1>Přidat kotě</h1>
    <form method="POST">
        <label for="name">Jméno:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="color_code">Kód barvy:</label>
        <input type="text" id="color_code" name="color_code" required>
        <br>
        <label for="description">Barva:</label>
        <input type="text" id="description" name="description" required>
        <br>
        <button type="submit">Přidat</button>
    </form>
</body>

</html>