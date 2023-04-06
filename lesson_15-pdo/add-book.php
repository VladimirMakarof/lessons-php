<?php
$server = $_SERVER;
if($server['REQUEST_METHOD'] === 'POST') {
    $post = $_POST;
    $title = $post['title'];
    $author = $post['author'];
    $price = (int)$post['price'];
    $sql = 'INSERT INTO tb_books(title, author, price) 
            VALUE (:book_title, :book_author, :book_price)';
    $params = [
        'book_title' => $title,
        'book_author' => $author,
        'book_price' => $price
    ];
    $server = 'localhost';
    $port = 3306;
    $user = 'web';
    $pwd = 'web';
    $db_name = 'library';

    $conn_str = "mysql:host=$server;port=$port;dbname=$db_name";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    $connection = new PDO($conn_str, $user, $pwd, $options);
    $statement = $connection->prepare($sql);
    if ($statement->execute($params)) {
        echo 'Книга добавлена, можете добавить еще';
    } else {
        echo 'Книга не была добавлена, попробуйте позже';
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление книги</title>
</head>
<body>
<form method="post" action="add-book.php">
    <div><input required type="text" placeholder="Название" name="title"></div>
    <div><input required type="text" placeholder="Автор" name="author"></div>
    <div><label>Стоимость: <input value="0" type="number" name="price"></label></div>
    <input type="submit" value="Добавить">
</form>

</body>
</html>
