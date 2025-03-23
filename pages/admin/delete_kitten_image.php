<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "odchovy");
$id = $_GET['id'];

// Fetch the image URL to delete the file
$query = "SELECT image_url FROM kotata_obrazky WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$image = $result->fetch_assoc();

if ($image) {
    $filePath = "../../" . $image['image_url'];
    if (file_exists($filePath)) {
        unlink($filePath); // Delete the file
    }
}

// Delete the database record
$stmt = $conn->prepare("DELETE FROM kotata_obrazky WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: manage_kitten_images.php");
exit();
