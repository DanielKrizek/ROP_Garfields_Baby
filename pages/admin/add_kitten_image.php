<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "odchovy");

// Fetch kittens for the dropdown
$kittensQuery = "SELECT id, name FROM kotata";
$kittensResult = mysqli_query($conn, $kittensQuery);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kitten_id = $_POST['kitten_id'];

    // Handle file upload
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../../uploads/kitten_images/";
        $fileName = basename($_FILES['image_url']['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Ensure the upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['image_url']['tmp_name'], $targetFilePath)) {
            $image_url = "uploads/kitten_images/" . $fileName;

            $stmt = $conn->prepare("INSERT INTO kotata_obrazky (kitten_id, image_url) VALUES (?, ?)");
            $stmt->bind_param("is", $kitten_id, $image_url);
            $stmt->execute();

            header("Location: manage_kitten_images.php");
            exit();
        } else {
            die("Chyba při nahrávání obrázku.");
        }
    } else {
        die("Nebyl vybrán žádný obrázek.");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Přidat obrázek kotěte</title>
</head>

<body>
    <a href="manage_kitten_images.php">Zpět na správu obrázků koťat</a>
    <h1>Přidat obrázek kotěte</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="kitten_id">Kotě:</label>
        <select id="kitten_id" name="kitten_id" required>
            <?php while ($kitten = mysqli_fetch_assoc($kittensResult)): ?>
                <option value="<?= $kitten['id'] ?>"><?= htmlspecialchars($kitten['name']) ?></option>
            <?php endwhile; ?>
        </select>
        <br>
        <label for="image_url">Obrázek:</label>
        <input type="file" id="image_url" name="image_url" accept="image/*" required>
        <br>
        <button type="submit">Přidat</button>
    </form>
</body>

</html>