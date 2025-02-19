<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";



if (!$conn = new mysqli($servername, $username, $password, $dbname)) {
    die("Connection failed: " . $conn->connect_error);
}
