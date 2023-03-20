<?php
session_start(); // в момент старта сессии, генерируется файл с рандомным именем 
// session_start(['read_and_close'=>true]);

$_SESSION['data'] = 'Данные сессии'; // обращаемся к массиву с сессиями 
// session_write_close();


?>
<!-- include_once подключаем содержимое файла к текущему, и если на найдет то ошибки не будет, повторно подключаться не будет  -->
<? include_once 'components/menu.php' ?>