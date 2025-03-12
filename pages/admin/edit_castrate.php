<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "kocicky");
$connUsers = new mysqli("localhost", "root", "", "login");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM castrates WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $birth_date = $_POST['birth_date'];
    $color_pattern = $_POST['color_pattern'];
    $breed_code = $_POST['breed_code'];
    $main_image = $_POST['main_image'];
    $gallery_images = $_POST['gallery_images'];

    $stmt = $conn->prepare("UPDATE castrates SET name=?, birth_date=?, color_pattern=?, breed_code=?, main_image=?, gallery_images=? WHERE id=?");
    $stmt->bind_param("ssssssi", $name, $birth_date, $color_pattern, $breed_code, $main_image, $gallery_images, $id);
    $stmt->execute();

    header("Location: admin_panel.php");
    exit();
}
?>

<form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required><br>
    <input type="date" name="birth_date" value="<?= $row['birth_date'] ?>" required><br>
    <input type="text" name="color_pattern" value="<?= htmlspecialchars($row['color_pattern']) ?>" required><br>
    <input type="text" name="breed_code" value="<?= htmlspecialchars($row['breed_code']) ?>" required><br>
    <input type="text" name="main_image" value="<?= htmlspecialchars($row['main_image']) ?>"><br>
    <input type="text" name="gallery_images" value="<?= htmlspecialchars($row['gallery_images']) ?>"><br>
    <button type="submit">Uložit změny</button>
</form>