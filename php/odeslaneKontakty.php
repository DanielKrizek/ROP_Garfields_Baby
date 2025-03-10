<?php
function db_connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contacts";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

session_start();
include("../php/connection.php");
include("../php/functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        $_SESSION['form_error'] = 'Všechna pole jsou povinná!';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['form_error'] = 'Neplatný email!';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $conn = db_connect();

    $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $name, $email, $message);
        if ($stmt->execute()) {
            $_SESSION['form_success'] = 'Vaše zpráva byla úspěšně odeslána!';
        } else {
            $_SESSION['form_error'] = 'Nastala chyba při ukládání zprávy. Zkuste to znovu.';
        }
        $stmt->close();
    } else {
        $_SESSION['form_error'] = 'Chyba při přípravě dotazu.';
    }

    $conn->close();

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
