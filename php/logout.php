<?php
session_start();

// Uložení jazyka před zničením session
$lang = $_SESSION['lang'] ?? 'cs';

session_unset();
session_destroy();

// Restart session a znovu nastavíme jazyk
session_start();
$_SESSION['lang'] = $lang;

$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : '../index.php';
header("Location: $redirect");
exit();
