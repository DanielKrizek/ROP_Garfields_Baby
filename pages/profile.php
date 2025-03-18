<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

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


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['lang-select'])) {
        $_SESSION['lang'] = $_POST['lang-select'];
    }
}


// Zpracování formuláře
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $new_password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    $errors = [];

    // Validace jména
    if ($new_username === $username) {
        $errors[] = translate('error_username_same');
    } elseif (strlen($new_username) < 3) {
        $errors[] = translate('error_username_short');
    }

    // Validace hesla
    if (!empty($new_password)) {
        if (strlen($new_password) < 6) {
            $errors[] = translate('error_password_short');
        }
        if ($new_password !== $confirm_password) {
            $errors[] = translate('error_password_mismatch');
        }
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
            $_SESSION['message'] = translate('profile_update_success');
            header("Location: profile.php");
            exit();
        } else {
            $errors[] = translate('profile_update_error');
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
    <link rel="stylesheet" href="../styles/global.css">
    <script src="https://unpkg.com/panzoom@9.4.0/dist/panzoom.min.js"></script>
    <script src="../js/hamburger.js" defer></script>
    <script src="../js/script.js" defer></script>
    <script src="../js/modal.js" defer></script>
    <script>
        function showAlert(message, isError) {
            const alertDiv = document.getElementById('custom-alert');
            alertDiv.textContent = message;
            alertDiv.style.backgroundColor = isError ? '#ffdddd' : '#ddffdd';
            alertDiv.style.borderColor = isError ? '#ff5555' : '#55aa55';
            alertDiv.style.display = 'block';

            setTimeout(() => {
                alertDiv.style.display = 'none';
            }, 5000);
        }
    </script>
</head>

<body>
    <header>
        <?php include("navbar.php"); ?>
    </header>

    <?php include("logForm.php"); ?>

    <h2 id="profile-h2"><?= translate('profile_edit') ?></h2>

    <div id="custom-alert"></div>

    <?php if (!empty($errors)): ?>
        <script>
            showAlert("<?= htmlspecialchars(implode(', ', $errors)) ?>", true);
        </script>
    <?php endif; ?>

    <?php if (isset($_SESSION['message'])): ?>
        <script>
            showAlert("<?= htmlspecialchars($_SESSION['message']) ?>", false);
        </script>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <form id="profile-edit-form" action="" method="post">
        <label for="username"><?= translate('username') ?>:</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>" required>

        <label for="password"><?= translate('new_password_optional') ?>:</label>
        <input type="password" id="password" name="password">

        <label for="confirm_password"><?= translate('confirm_password') ?>:</label>
        <input type="password" id="confirm_password" name="confirm_password">

        <button type="submit"><?= translate('save_changes') ?></button>
    </form>
</body>

</html>