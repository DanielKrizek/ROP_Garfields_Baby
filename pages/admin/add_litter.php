<?php
session_start();
include("../../php/connection.php");
include("../../php/functions.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "odchovy");
$connUsers = new mysqli("localhost", "root", "", "login");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $image_url = $_POST['image_url'];

    $query = "INSERT INTO litters (name, image_url) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $name, $image_url);

    if ($stmt->execute()) {
        header("Location: admin_panel.php");
        exit;
    } else {
        echo "Chyba při přidávání odchovu: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Přidat odchov</title>
</head>

<body>
    <h1>Přidat odchov</h1>
    <form method="POST">
        <label for="name">Jméno:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="image_url">URL obrázku:</label>
        <input type="text" id="image_url" name="image_url" required>
        <br>
        <button type="submit">Přidat</button>
    </form>
</body>

</html>