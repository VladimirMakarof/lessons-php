<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Загрузка файлов</title>
</head>

<body>

    <form action="form_handler.php" method="post" enctype="multipart/form-data">
        <div>
            <input name="user_name" type="text" placeholder="Ваше имя">
        </div>
        <div>
            <input name="picture" accept="image/*" type="file">
        </div>
        <input type="submit" value="Отправить">
    </form>

</body>

</html>