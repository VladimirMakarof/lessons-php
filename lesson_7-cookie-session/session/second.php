<?php
session_start();

if (isset($_SESSION['data'])) {
    var_dump('Получили ' . $_SESSION['data']);
}

?>

<? include_once 'components/menu.php' ?>
