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

$query = "DELETE FROM litters WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: admin_panel.php");
    exit;
} else {
    echo "Chyba při mazání odchovu: " . $conn->error;
}
