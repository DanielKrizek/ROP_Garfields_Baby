<?php
session_start();

$lang = $_SESSION['lang'] ?? 'cs';

session_unset();
session_destroy();

session_start();
$_SESSION['lang'] = $lang;

$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : '../index.php';
header("Location: $redirect");
exit();
