<?php // form.php (форма входа)
session_start(); // старт сессии, генерирует файл с таким названием PHPSESSID и значением 025n1poadeuu0ba8d9iuv5nk2q и отправляет клиенту с куками его 
$server = $_SERVER;

if (isset($_SESSION['login'])) { // при повторном заходе на form форма не будет отображаться, если в супер массиве сессии есть логин то его перенаправляем на account 
    header('Location: account.php');
}

// строка запроса form.php
// заголовки: cookie (PHPSESSID: 025n1poadeuu0ba8d9iuv5nk2q)
// тело сообщения: login: qwerty, password: 123

// qwerty 123
if ($server['REQUEST_METHOD'] === 'POST') { // если метод запроса post то пользователь нажал войти 
    $post = $_POST; // переопределяем супер глобальные массив 
    if (
        trim($post['login']) === 'qwerty' && // убираем пробелы через метод trim и сверяем полученное значение со значением из хранилища 
        trim($post['password']) === '123'
    ) {
        $_SESSION['login'] = $post['login']; // если все данные введены корректно добавляем логин в супер глобальный массив сессии 
        header('Location: account.php'); // перенаправляем в личный кабинет 
    } else {
        $error = 'Ошибка авторизации'; // данные введены не корректно 
    }
}

?>
<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Форма входа</title>
</head>

<body>
    <!-- сли переменная error существует то выводим пользователю значение этой переменной -->
    <? if (isset($error)) : ?>
        <p><?= $error ?></p>
    <? endif; ?>
    <form method="post" action="form.php">
        <input type="text" placeholder="Введите логин" name="login">
        <input type="password" placeholder="Введите пароль" name="password">
        <input type="submit" value="Войти">
    </form>
</body>

</html>