<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "odchovy");
$id = $_GET['id'];
$query = "SELECT * FROM kotata WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$kitten = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $color_code = $_POST['color_code'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE kotata SET name = ?, color_code = ?, description = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $color_code, $description, $id);
    $stmt->execute();

    header("Location: manage_kittens.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Upravit kotě</title>
</head>

<body>
    <a href="manage_kittens.php">Zpět na správu koťat</a> <!-- Link back to kittens management -->
    <h1>Upravit kotě</h1>
    <form method="POST">
        <label for="name">Jméno:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($kitten['name']) ?>" required>
        <br>
        <label for="color_code">Kód barvy:</label>
        <input type="text" id="color_code" name="color_code" value="<?= htmlspecialchars($kitten['color_code']) ?>" required>
        <br>
        <label for="description">Barva:</label>
        <input type="text" id="description" name="description" value="<?= htmlspecialchars($kitten['description']) ?>" required>
        <br>
        <button type="submit">Uložit změny</button>
    </form>
</body>

</html>