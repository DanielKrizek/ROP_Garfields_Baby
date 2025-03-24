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

    // Handle image upload
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../../../img/odchovy/";
        $fileName = basename($_FILES['image_url']['name']);
        $targetFilePath = $uploadDir . $fileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['image_url']['tmp_name'], $targetFilePath)) {
            $image_url = "../img/odchovy/" . $fileName;
        } else {
            die("Chyba při nahrávání obrázku.");
        }
    } else {
        $image_url = null; // No image uploaded
    }

    $stmt = $conn->prepare("INSERT INTO litters (name, image_url) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $image_url);
    $stmt->execute();

    header("Location: manage_litters.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Přidat odchov</title>
</head>

<body>
    <a href="manage_litters.php">Zpět na správu odchovů</a> <!-- Link back to manage_litters -->
    <h1>Přidat odchov</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Jméno:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="image_url">URL obrázku:</label>
        <input type="file" id="image_url" name="image_url">
        <br>
        <button type="submit">Přidat</button>
    </form>
</body>

</html>