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

    // Handle file upload
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../../../img/odchovy/";
        $fileName = basename($_FILES['image_url']['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Ensure the upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['image_url']['tmp_name'], $targetFilePath)) {
            $image_url = "../img/odchovy/" . $fileName;

            // Delete the old image file
            $oldFilePath = "../../" . $litter['image_url'];
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        } else {
            die("Chyba při nahrávání obrázku.");
        }
    } else {
        $image_url = $litter['image_url']; // Keep the existing image if no new image is uploaded
    }

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
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Jméno:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($litter['name']) ?>" required>
        <br>
        <label for="image_url">Obrázek:</label>
        <input type="file" id="image_url" name="image_url" accept="image/*">
        <br>
        <?php if ($litter['image_url']): ?>
            <img src="../../<?= htmlspecialchars($litter['image_url']) ?>" alt="Obrázek odchovu" width="100">
        <?php endif; ?>
        <br>
        <button type="submit">Uložit změny</button>
    </form>
</body>

</html>