<?php
// Подключение к базе данных
$server = "localhost";
$username = "root";
$password = "1234";
$dbname = "library";

$conn = new mysqli($server, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Запрос к базе данных для получения всех записей из таблицы tb_books
$sql = "SELECT * FROM tb_books";
$result = $conn->query($sql);

// Проверка наличия записей в таблице
if ($result->num_rows > 0) {
  // Вывод каждой записи в виде HTML таблицы
  echo "<table><tr><th>ID</th><th>Title</th><th>Author</th><th>Price</th><th>Image</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["title"] . "</td><td>" . $row["author"] . "</td><td>" . $row["price"] . "</td><td><img src='" . $row["img"] . "'></td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
