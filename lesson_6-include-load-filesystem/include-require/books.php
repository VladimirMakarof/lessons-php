<?php
require_once 'books-data.php'; // подключаем (скопируем и вставляем в это место содержимое) файл через require_once
$books = get_books(); // после мы можем из нашего файла обратиться ко всем функциям из подключенного (скопированного) function get_books() из файла
?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Книги</title>
</head>

<body>
    <!-- include_once подкачается только 1 раз  при дублировании -->
    <? include_once 'components/header.php' ?>
    <? include_once 'components/header.php' ?>

    <main>
        <!-- перебираем книги  -->
        <? foreach ($books as $book) : ?>
            <div>
                <h2><?= $book['title'] ?></h2>
                <!--          <h2>--><? // echo $book['title'] 
                                        ?><!--</h2>-->
            </div>
        <? endforeach; ?>
    </main>
    <!-- include подкачается каждый раз  -->
    <? include 'components/footer.php' ?>
    <? include 'components/footer.php' ?>
</body>

</html>