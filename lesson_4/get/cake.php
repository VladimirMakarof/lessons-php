<?php
$cakes = require_once 'cakes_data.php';
$get = $_GET; // создаём переменную с супер глобальным массив get, получаем значение id
//var_dump($get['id']);
$id = (int)$get['id']; // приведение к int, если нужно число с id. либо title 
if (!isset($id)) { // проверка задан ли id, параметр id не передан 
	//404 страница
	header("Location: cakes.php"); // функция header перенаправляет пользователя на определенную страницу, в случе если нет id 
}
$cake = $cakes[$get['id'] - 1];
if (!isset($cake)) { // проверка на наличие товара по id, и в случае если товара больше нет в базе то перенаправляем пользователя на 404
	header("Location: cakes.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $cake['name'] ?></title>
	<link rel="stylesheet" href="/css/cake.css">
</head>

<body>

	<section class="cake">
		<div class="info">
			<h2><?= $cake['name'] ?></h2>
			<p><?= $cake['description'] ?></p>
			<p>Стоимость <?= $cake['price'] . $cake['currency'] ?></p>
		</div>
		<div class="img">
			<img src="/img/<?= $cake['main_img'] ?>" alt="<?= $cake['name'] ?>">
		</div>
		<div class="images">
			<? foreach ($cake['imgs'] as $img) : ?>
				<img src="/img/<?= $img ?>" alt="<?= $cake['name'] ?>">
			<? endforeach; ?>
		</div>
		<div class="buy">
			<a href="">Заказать</a>
		</div>
	</section>

</body>

</html>