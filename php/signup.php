<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $message = signup($conn, $username, $password);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
</head>

<body>
    <form method="post">
        <div><?php echo isset($message) ? $message : ''; ?></div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Signup</button>
    </form>
</body>

</html>