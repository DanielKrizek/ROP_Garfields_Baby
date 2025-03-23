<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "odchovy");
$id = $_GET['id'];

// Fetch the current image data
$query = "SELECT * FROM kotata_obrazky WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$imageData = $result->fetch_assoc();

// Fetch kittens for the dropdown
$kittensQuery = "SELECT id, name FROM kotata";
$kittensResult = mysqli_query($conn, $kittensQuery);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kitten_id = $_POST['kitten_id'];

    // Fetch litter name and batch number based on kitten_id
    $litterQuery = "
        SELECT l.name AS litter_name, l.batch_number 
        FROM kotata k
        JOIN litters l ON k.litter_id = l.id
        WHERE k.id = ?";
    $stmt = $conn->prepare($litterQuery);
    $stmt->bind_param("i", $kitten_id);
    $stmt->execute();
    $litterResult = $stmt->get_result();
    $litterData = $litterResult->fetch_assoc();

    if (!$litterData) {
        die("Chyba: Nepodařilo se načíst informace o vrhu.");
    }

    // Extract the letter from the litter name (e.g., "vrh B" -> "b")
    preg_match('/[a-zA-Z]$/', $litterData['litter_name'], $matches);
    $litterLetter = strtolower($matches[0]); // Convert to lowercase
    $batchNumber = $litterData['batch_number']; // e.g., 1
    $folderName = $batchNumber . $litterLetter; // e.g., "1b"

    // Handle file upload
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../../img/odchovy/kotata/" . $folderName . "/";
        $fileName = basename($_FILES['image_url']['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Ensure the upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['image_url']['tmp_name'], $targetFilePath)) {
            $image_url = "../img/odchovy/kotata/" . $folderName . "/" . $fileName;

            // Delete the old image file
            $oldFilePath = "../../" . $imageData['image_url'];
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        } else {
            die("Chyba při nahrávání obrázku.");
        }
    } else {
        $image_url = $imageData['image_url']; // Keep the existing image if no new image is uploaded
    }

    $stmt = $conn->prepare("UPDATE kotata_obrazky SET kitten_id = ?, image_url = ? WHERE id = ?");
    $stmt->bind_param("isi", $kitten_id, $image_url, $id);
    $stmt->execute();

    header("Location: manage_kitten_images.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Upravit obrázek kotěte</title>
</head>

<body>
    <a href="manage_kitten_images.php">Zpět na správu obrázků koťat</a>
    <h1>Upravit obrázek kotěte</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="kitten_id">Kotě:</label>
        <select id="kitten_id" name="kitten_id" required>
            <?php while ($kitten = mysqli_fetch_assoc($kittensResult)): ?>
                <option value="<?= $kitten['id'] ?>" <?= $kitten['id'] == $imageData['kitten_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($kitten['name']) ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br>
        <label for="image_url">Obrázek:</label>
        <input type="file" id="image_url" name="image_url" accept="image/*">
        <br>
        <?php if ($imageData['image_url']): ?>
            <img src="../../<?= htmlspecialchars($imageData['image_url']) ?>" alt="Obrázek kotěte" width="100">
        <?php endif; ?>
        <br>
        <button type="submit">Uložit změny</button>
    </form>
</body>

</html>