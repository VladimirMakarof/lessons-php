<?php
// статус ответа
// заголовки
// тело сообщения 
setcookie('key', 'данные', time() + 3600); // имя_значение, 3600 время жизни куки
//var_dump($_COOKIE); $_COOKIE - супер глобальный массив с куками 
$server = $_SERVER;
if ($server['REQUEST_METHOD'] === 'POST') {
    $post = $_POST;
    $user_color = $post['color'];
    setcookie('color', $user_color, time() + 3600);
    $background = $post['color'] ?? 'blue';
} elseif ($server['REQUEST_METHOD'] === 'GET') {
    $background = $_COOKIE['color'] ?? 'blue';
}

// $background = $post['color'] ?? 'blue';
?>


<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Cookie</title>
</head>

<body style="background-color: <?= $background ?>">
    <form action="cookie.php" method="post">
        <label for="change">Изменить цвет фона</label>
        <select id="change" name="color">
            <option value="red">Красный</option>
            <option value="yellow">Желтый</option>
            <option value="blue">Синий</option>
        </select>
        <input type="submit" value="Изменить цвет">
    </form>
</body>

</html>