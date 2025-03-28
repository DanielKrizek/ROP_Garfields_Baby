<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "kocicky");
$connUsers = new mysqli("localhost", "root", "", "login");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM toms WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $birth_date = $_POST['birth_date'];
    $color_pattern = $_POST['color_pattern'];
    $color_code = $_POST['color_code'];

    if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../../../img/toms/";
        $fileName = basename($_FILES['main_image']['name']);
        $targetFilePath = $uploadDir . $fileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['main_image']['tmp_name'], $targetFilePath)) {
            $main_image = "../img/toms/" . $fileName;

            $oldFilePath = "../../" . $row['main_image'];
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        } else {
            die("Chyba při nahrávání hlavního obrázku.");
        }
    } else {
        $main_image = $row['main_image'];
    }

    $gallery_images = [];
    if (isset($_FILES['gallery_images']) && count($_FILES['gallery_images']['name']) > 0) {
        $uploadDir = "../../../img/toms/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        foreach ($_FILES['gallery_images']['name'] as $key => $fileName) {
            if ($_FILES['gallery_images']['error'][$key] === UPLOAD_ERR_OK) {
                $targetFilePath = $uploadDir . basename($fileName);
                if (move_uploaded_file($_FILES['gallery_images']['tmp_name'][$key], $targetFilePath)) {
                    $gallery_images[] = "../img/toms/" . $fileName;
                }
            }
        }
    }

    $gallery_images_path = implode(",", $gallery_images);
    if (empty($gallery_images_path)) {
        $gallery_images_path = $row['gallery_images'];
    }

    $stmt = $conn->prepare("UPDATE toms SET name=?, birth_date=?, color_pattern=?, color_code=?, main_image=?, gallery_images=? WHERE id=?");
    $stmt->bind_param("ssssssi", $name, $birth_date, $color_pattern, $color_code, $main_image, $gallery_images_path, $id);
    $stmt->execute();

    header("Location: manage_toms.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../svg/logo.svg">
    <title>Edit Kocour</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <a href="manage_toms.php">Zpět na správu kocourů</a><br><br>
        <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required><br>
        <input type="date" name="birth_date" value="<?= $row['birth_date'] ?>" required><br>
        <input type="text" name="color_pattern" value="<?= htmlspecialchars($row['color_pattern']) ?>" required><br>
        <input type="text" name="color_code" value="<?= htmlspecialchars($row['color_code']) ?>" required><br>
        <label for="main_image">Hlavní obrázek:</label>
        <input type="file" id="main_image" name="main_image" accept="image/*">
        <br>
        <?php if ($row['main_image']): ?>
            <img src="../../<?= htmlspecialchars($row['main_image']) ?>" alt="Hlavní obrázek" width="100">
        <?php endif; ?>
        <br>
        <label for="gallery_images">Galerie obrázků:</label>
        <input type="file" id="gallery_images" name="gallery_images[]" accept="image/*" multiple>
        <br>
        <?php if ($row['gallery_images']): ?>
            <?php foreach (explode(",", $row['gallery_images']) as $gallery_image): ?>
                <img src="../../<?= htmlspecialchars($gallery_image) ?>" alt="Galerie obrázek" width="50">
            <?php endforeach; ?>
        <?php endif; ?>
        <br>
        <button type="submit">Uložit změny</button>
    </form>
</body>

</html>