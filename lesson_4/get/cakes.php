<?php
$cakes = require_once 'cakes_data.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="/css/cakes.css">
</head>
<body>
	<main>
		<?php foreach ($cakes as $cake): ?>	
		<div class="cake">
			<h2><?= $cake['name'] ?></h2>
			<!-- <h2><? // echo cake['name'] ?></h2> -->
			<div>
				<img src="/img/<?= $cake['main_img'] ?>" alt="<?= $cake['name'] ?>">
			</div>
			<p>Стоимость: <?= $cake['price'] . $cake['currency'] ?></p>
			<a href="cake.php?id=<?= $cake['id'] ?>">Подробнее</a>
		</div>
	<?php endforeach; ?>
	</main>
</body>
</html>