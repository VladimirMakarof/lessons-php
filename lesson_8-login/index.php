<?php
session_start();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
</head>
<body>
<nav>
    <!-- отображать, если пользователь авторизован if():-->
    <? if(isset($_SESSION['login'])): ?>
        <a href="logout.php">Выйти</a>
    <? else: ?>
    <!-- отображать, если пользователь не авторизован else:-->
        <a href="form.php">Войти</a>
    <? endif; ?>
</nav>

<h2>Lorem ipsum</h2>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    Aspernatur, aut eveniet ex in quas qui vel. Excepturi
    explicabo iure porro temporibus totam?
</p>

<!-- отображать, если пользователь авторизован-->
<? if(isset($_SESSION['login'])): ?>
    <textarea></textarea>
    <input type="button" value="Добавить комментарий">
<? endif; ?>
</body>
</html>

