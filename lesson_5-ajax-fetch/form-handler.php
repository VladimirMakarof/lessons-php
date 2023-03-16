<?php
// обработка данных формы авторизации

$server = $_SERVER; // педположим логин 'qwerty' а пароль '123'
if ($server['REQUEST_METHOD'] === 'POST') { // проверка запроса, получаем методом post
	$post = $_POST; // переопределяем post из глобального супер массива 
	if ($post['login'] !== 'qwerty' || $post['password'] !== '123') { // проверка логина и пароля 
		$answer = [
			'message' => 'error',
			'reason' => 'Ошибка ввода логина или пароля'
		];
	} else {
		$answer = [
			'message' => 'success'
		];
	}
	echo json_encode($answer); // echo добавляет информацию в тело сообщения, и в создаём json строчку и возвращаем клиенту 
}
