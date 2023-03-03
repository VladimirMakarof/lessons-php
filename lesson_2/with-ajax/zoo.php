<?php
$animals = require_once $_SERVER['DOCUMENT_ROOT'] . '/data/animals-data.php';
$user_data = require_once $_SERVER['DOCUMENT_ROOT'] . '/data/user-data.php';

// объединение в ассоциативных 2 массива
$response = [
  'user' => $user_data,
  'animals' => $animals
];
// массив $response конвертируется в формат JSON с помощью функции json_encode() и выводится на экран
echo json_encode($response);
