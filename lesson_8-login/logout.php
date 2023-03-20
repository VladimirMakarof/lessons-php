<?php
session_start();
$_SESSION = [];
// unset($_SESSION['login']);
// session_destroy();
// setcookie('PHPSESSID', null, -1);
header('Location: index.php');
