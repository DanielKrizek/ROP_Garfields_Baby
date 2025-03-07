<?php
function db_connect()
{
    $servername = "localhost"; // Adresa serveru
    $username = "root"; // Uživatelské jméno
    $password = ""; // Heslo
    $dbname = "contacts"; // Název databáze

    // Připojení k databázi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kontrola připojení
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

session_start();
include("../php/connection.php"); // Připojení k databázi
include("../php/functions.php");  // Pokud potřebujete nějaké pomocné funkce

// Zkontrolujeme, zda byl formulář odeslán
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Získáme hodnoty z formuláře
    $name = htmlspecialchars($_POST['name']); // Bezpečné zacházení s textovými vstupy
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Ověření, zda jsou všechna pole vyplněná
    if (empty($name) || empty($email) || empty($message)) {
        $_SESSION['form_error'] = 'Všechna pole jsou povinná!';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Ověření validního emailu
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['form_error'] = 'Neplatný email!';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Připojení k databázi
    $conn = db_connect(); // Předpokládám, že máte funkci pro připojení k databázi

    // Příprava SQL dotazu pro vložení dat do tabulky
    $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Provádíme přípravu a vykonání SQL dotazu
    if ($stmt) {
        $stmt->bind_param("sss", $name, $email, $message); // Parametry pro dotaz
        if ($stmt->execute()) {
            // Úspěšné uložení do databáze
            $_SESSION['form_success'] = 'Vaše zpráva byla úspěšně odeslána!';
        } else {
            // Chyba při ukládání do databáze
            $_SESSION['form_error'] = 'Nastala chyba při ukládání zprávy. Zkuste to znovu.';
        }
        $stmt->close();
    } else {
        $_SESSION['form_error'] = 'Chyba při přípravě dotazu.';
    }

    // Zavřeme připojení
    $conn->close();

    // Přesměrování zpět na formulář
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
