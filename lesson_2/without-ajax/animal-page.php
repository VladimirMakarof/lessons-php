<?php
//require_once 'имя_файла.php'; подключение файла к другому
$animals = require_once $_SERVER['DOCUMENT_ROOT'] . '/data/animals-data.php'; // благодаря return в файле массив оказывается в переменной 
$user_data = require_once $_SERVER['DOCUMENT_ROOT'] . '/data/user-data.php';

// $_SERVER суперглобальный массив который хранит информацию о сервере 
// DOCUMENT_ROOT - корневая директория сервера 
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Зверинец</title>
</head>

<body>
	<section>
		<h2>Все животные</h2>

		<?php foreach ($animals as $animal) : ?>
			<div>
				<h3><?php $animal['name'] ?></h3>
				<div>
					<img height="300" src="/img/<?= $animal['img'] ?>">
				</div>
				<?php if ($user_data['role'] === 'admin') : ?>
					<button>Перейти к редактированию</button>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</section>
</body>

</html>