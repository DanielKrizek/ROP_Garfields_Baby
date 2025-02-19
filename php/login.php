<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error = login($conn, $username, $password);
    echo json_encode(['error' => $error]);
    die;
}
