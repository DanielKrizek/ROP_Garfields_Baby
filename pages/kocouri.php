<?php
session_start();

include("../php/connection.php");
include("../php/functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $error = login($conn, $username, $password);
    } elseif (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $message = signup($conn, $username, $password);
    } elseif (isset($_POST['lang-select'])) {
        $_SESSION['lang'] = $_POST['lang-select'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garfields Baby</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/Header.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <script src="../js/hamburger.js" defer></script>
    <script src="../js/script.js" defer></script>
</head>

<body>
    <header>
        <?php include("navbar.php"); ?>
    </header>

    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn material-symbols-rounded">close</span>
        <div class="form-box login">
            <div class="form-content">
                <h2 id="login-text1">PŘIHLÁSIT SE</h2>
                <form method="post">
                    <div class="input-field">
                        <input type="text" name="username" required>
                        <label id="type-email1">Zadej uživatelské jméno</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label id="type-passw1">Zadej heslo</label>
                    </div>
                    <button id="loginBtn1" type="submit" name="login">Přihlásit se</button>
                </form>
                <div id="bottom1" class="bottom-link">
                    Ještě nejsi zaregistrovaný?
                    <a href="#" id="signup-link">Zaregistrovat se</a>
                </div>
            </div>
        </div>
        <div class="form-box signup">
            <div class="form-content">
                <h2 id="login-text2">ZAREGISTROVAT SE</h2>
                <form method="post">
                    <div class="input-field">
                        <input type="text" name="username" required>
                        <label id="type-email2">Zadej uživatelské jméno</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label id="type-passw2">Zadej heslo</label>
                    </div>
                    <button id="loginBtn2" type="submit" name="signup">Zaregistrovat se</button>
                </form>
                <div id="bottom2" class="bottom-link">
                    Už máš účet?
                    <a href="#" id="login-link">Přihlásit se</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>