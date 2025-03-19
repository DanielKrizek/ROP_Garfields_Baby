<?php
session_start();
include("../../php/connection.php");
include("../../php/functions.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "odchovy");
$connUsers = new mysqli("localhost", "root", "", "login");

$id = $_GET['id'];
$query = "SELECT * FROM litters WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$litter = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $image_url = $_POST['image_url'];

    $query = "UPDATE litters SET name = ?, image_url = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $name, $image_url, $id);

    if ($stmt->execute()) {
        header("Location: admin_panel.php");
        exit;
    } else {
        echo "Chyba při úpravě odchovu: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Upravit odchov</title>
</head>

<body>
    <h1>Upravit odchov</h1>
    <form method="POST">
        <label for="name">Jméno:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($litter['name']) ?>" required>
        <br>
        <label for="image_url">URL obrázku:</label>
        <input type="text" id="image_url" name="image_url" value="<?= htmlspecialchars($litter['image_url']) ?>" required>
        <br>
        <button type="submit">Uložit změny</button>
    </form>
</body>

</html>