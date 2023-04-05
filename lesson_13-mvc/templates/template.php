<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
<header>
    <nav>
        <a href="/">Главная</a>
        <a href="/books">Книги</a>
    </nav>
</header>

<main>
    <!-- $content - имя файла с html разметкой -->
    <? include_once $content ?>
</main>

<footer>Подвал сайта</footer>
</body>
</html>
