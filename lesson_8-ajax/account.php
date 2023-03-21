<?php // account.php (личный кабинет пользователя)
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: form.php');
}
$login = $_SESSION['login'];
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
</head>
<body>

<nav>
    <a href="index.php">Главная</a>
    <a href="logout.php">Выйти</a>
</nav>

<h2><?= $login ?>, добро пожаловать в личный кабинет</h2>

</body>
</html>
