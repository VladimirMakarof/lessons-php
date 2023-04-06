<?php
$server = 'localhost'; // адрес сервера где запущен mySQL
$port = 3306; // порт 
$user = 'root';
$pwd = '1234';
$db_name = 'library';

$conn_str = "mysql:host=$server;port=$port;dbname=$db_name";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];
$connection = new PDO($conn_str, $user, $pwd, $options);
//$connection = new PDO($conn_str, $user, $pwd, $options);
var_dump($connection); // object(PDO)[1]


$sql = 'SELECT * FROM tb_books';
// query выполняет запрос $sql и возвращает PDOStatement,
// с помощью которого мы извлекаем данные
$statement = $connection->query($sql);
// извлечение нескольких строк
// PDO::FETCH_ASSOC - извлечение данных в ассоциативный массив
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);
// не SELECT (создание/обновление/удаление)
$sql = 'INSERT INTO tb_books(title, author) 
VALUE (\'Новая книга\', \'Автор книги\')';
// exec выполняет запрос и возвращает:
// true - если запрос выполнен успешно
// false - если запрос выполнен с ошибкой
if ($connection->exec($sql)) {
    echo 'Данные успешно добавлены';
} else {
    echo 'Попробуйте еще раз';
}

//! подготовленные запросы c именованными параметрами
// передаём пользовательские данные, пришли из формы пользователя 
$title = 'Грокаем алгоритмы';
// $sql = 'SELECT author, title FROM tb_books WHERE title=' . $title;
$sql = 'SELECT author, title FROM tb_books WHERE title=:book_title';
// ассоциативный массив с параметрами
$params = [
    // имя параметра из запроса => данные
    'book_title' => $title
];
// prepare возвращает объект PDOStatement
$statement = $connection->prepare($sql);
// выполнение любого подготовленного запроса (и select и не select)
$statement->execute($params);
$result = $statement->fetch(PDO::FETCH_ASSOC);
var_dump($result);


// подготовленные запросы c неименованными параметрами
$title = 'Грокаем алгоритмы';
// $sql = 'SELECT author, title FROM tb_books WHERE title=' . $title;
$sql = 'SELECT author, title FROM tb_books WHERE title=?';
// нумерованный массив с данные
$params = [$title];
// prepare возвращает объект PDOStatement
$statement = $connection->prepare($sql);
// выполнение любого подготовленного запроса (и select и не select)
$statement->execute($params);
$result = $statement->fetch(PDO::FETCH_ASSOC);
var_dump($result);

$title = 'Грокаем алгоритмы';
// $sql = 'SELECT author, title FROM tb_books WHERE title=' . $title;
$sql = 'SELECT author, title FROM tb_books WHERE title=:book_title';
// prepare возвращает объект PDOStatement
$statement = $connection->prepare($sql);
$statement->bindValue(':book_title', $title, PDO::PARAM_STR);
// выполнение любого подготовленного запроса (и select и не select)
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);
var_dump($result);

$title = 'Грокаем алгоритмы';
// $sql = 'SELECT author, title FROM tb_books WHERE title=' . $title;
$sql = 'SELECT author, title FROM tb_books WHERE title=?';
// prepare возвращает объект PDOStatement
$statement = $connection->prepare($sql);
$statement->bindValue(1, $title, PDO::PARAM_STR);
// выполнение любого подготовленного запроса (и select и не select)
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);
var_dump($result);
