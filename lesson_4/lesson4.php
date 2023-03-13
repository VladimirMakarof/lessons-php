<?php
$server = $_SERVER; // создает переменную $server и присваивает ей массив значений, полученных из глобальной переменной $_SERVER
if ($server['REQUEST_METHOD'] === 'GET') {
	$get = $_GET; // всё что передаём после ? отправляется в супер глобальном get массиве ?price=2300&count=7 и после оттуда будем получать информацию 
	$price = $get['price']; // получаем данные, обращаемся к массиву get и по ключу price получаем значение 2300
	$items_count = $get['count']; // 7
	var_dump($price, $items_count);
}
?>

<a href="lesson4.php?price=2300&count=7">
	Get Запрос с параметрами
</a>