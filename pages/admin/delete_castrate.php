<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "kocicky");
$connUsers = new mysqli("localhost", "root", "", "login");

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM castrates WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: manage_castrates.php");
exit();
