<?php
session_start(); // второй и последующие запросы, это воссоздание текущей сессии 

if (isset($_SESSION['data'])) {
    var_dump('Получили ' . $_SESSION['data']);
}

?>

<? include_once 'components/menu.php' ?>
