<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "odchovy");
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM kotata WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: manage_kittens.php");
exit();
