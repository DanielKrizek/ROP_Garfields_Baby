<?php
session_start();

include("../php/connection.php");
include("../php/functions.php");

$connUsers = new mysqli("localhost", "root", "", "login");

$user_id = $_SESSION['user_id'];

// Získání aktuálních údajů o uživateli
$stmt = $conn->prepare("SELECT username FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$username = $user['username'];

// Zpracování formuláře
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = trim($_POST['username']);
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    // Validace jména
    if (strlen($new_username) < 3) {
        $errors[] = "Uživatelské jméno musí mít alespoň 3 znaky.";
    }

    // Validace hesla
    if (!empty($new_password) && strlen($new_password) < 6) {
        $errors[] = "Heslo musí mít alespoň 6 znaků.";
    }

    if ($new_password !== $confirm_password) {
        $errors[] = "Hesla se neshodují.";
    }

    // Pokud nejsou chyby, aktualizujeme databázi
    if (empty($errors)) {
        if (!empty($new_password)) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET username = ?, password = ? WHERE user_id = ?");
            $stmt->bind_param("ssi", $new_username, $hashed_password, $user_id);
        } else {
            $stmt = $conn->prepare("UPDATE users SET username = ? WHERE user_id = ?");
            $stmt->bind_param("si", $new_username, $user_id);
        }

        if ($stmt->execute()) {
            $_SESSION['message'] = "Profil byl úspěšně aktualizován.";
            header("Location: profile.php");
            exit();
        } else {
            $errors[] = "Chyba při aktualizaci profilu.";
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garfields Baby</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="../styles/Header.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/profile.css">
    <script src="https://unpkg.com/panzoom@9.4.0/dist/panzoom.min.js"></script>
    <script src="../js/hamburger.js" defer></script>
    <script src="../js/script.js" defer></script>
    <script src="../js/modal.js" defer></script>
</head>

<body>
    <header>
        <?php include("navbar.php"); ?>
    </header>

    <?php include("logForm.php"); ?>

    <h2 id="profile-h2">Úprava profilu</h2>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li style="color: red;"> <?= htmlspecialchars($error) ?> </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (isset($_SESSION['message'])): ?>
        <p style="color: green;"> <?= $_SESSION['message'] ?> </p>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <form id="profile-edit-form" action="" method="post">
        <label for="username">Uživatelské jméno:</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>" required>

        <label for="password">Nové heslo (nepovinné):</label>
        <input type="password" id="password" name="password">

        <label for="confirm_password">Potvrzení hesla:</label>
        <input type="password" id="confirm_password" name="confirm_password">

        <button type="submit">Uložit změny</button>
    </form>
</body>

</html>