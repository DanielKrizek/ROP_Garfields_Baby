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
    $breed_code = $_POST['color_code'];

    if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../../../img/castrates/";
        $fileName = basename($_FILES['main_image']['name']);
        $targetFilePath = $uploadDir . $fileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['main_image']['tmp_name'], $targetFilePath)) {
            $main_image = "../img/castrates/" . $fileName;
        } else {
            die("Chyba při nahrávání hlavního obrázku.");
        }
    } else {
        $main_image = null;
    }

    $gallery_images = [];
    if (isset($_FILES['gallery_images']) && count($_FILES['gallery_images']['name']) > 0) {
        $uploadDir = "../../../img/castrates/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        foreach ($_FILES['gallery_images']['name'] as $key => $fileName) {
            if ($_FILES['gallery_images']['error'][$key] === UPLOAD_ERR_OK) {
                $targetFilePath = $uploadDir . basename($fileName);
                if (move_uploaded_file($_FILES['gallery_images']['tmp_name'][$key], $targetFilePath)) {
                    $gallery_images[] = "../img/castrates/" . $fileName;
                }
            }
        }
    }

    $gallery_images_path = implode(",", $gallery_images);

    $stmt = $conn->prepare("INSERT INTO castrates (name, birth_date, color_pattern, color_code, main_image, gallery_images) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $birth_date, $color_pattern, $breed_code, $main_image, $gallery_images_path);
    $stmt->execute();

    header("Location: manage_castrates.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Přidat kastráta</title>
</head>

<body>
    <a href="manage_castrates.php">Zpět na správu kastrátů</a>
    <h1>Přidat kastráta</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Jméno" required><br>
        <input type="date" name="birth_date" required><br>
        <input type="text" name="color_pattern" placeholder="Barva" required><br>
        <input type="text" name="breed_code" placeholder="Kód plemene" required><br>
        <input type="file" name="main_image" placeholder="Hlavní obrázek URL"><br>
        <input type="file" name="gallery_images[]" placeholder="Galerie obrázků (oddělené čárkou)" multiple><br>
        <button type="submit">Přidat</button>
    </form>
</body>

</html>