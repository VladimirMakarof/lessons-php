<?php
session_start();
// session_start(['read_and_close'=>true]);

$_SESSION['data'] = 'Данные сессии';
// session_write_close();


?>

<? include_once 'components/menu.php' ?>