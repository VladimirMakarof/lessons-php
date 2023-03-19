<?php
$login_email_phone = $_POST['login_email_phone'];
$password = $_POST['password'];

// Проверяем, что оба поля заполнены
if (empty($login_email_phone) || empty($password)) {
  echo "Пожалуйста, заполните все поля.";
  exit;
}

$users_file = 'users.txt';

// Проверяем, существует ли файл с пользователями
if (!file_exists($users_file)) {
  // Создаем файл и записываем заголовок
  $header = "login;password\n";
  $users_file_handle = fopen($users_file, 'w');
  fwrite($users_file_handle, $header);
  fclose($users_file_handle);
}

// Открываем файл для чтения
$users_file_handle = fopen($users_file, 'r');

// Проверяем, что файл открыт успешно
if (!$users_file_handle) {
  echo "Не удалось открыть файл с пользователями.";
  exit;
}

// Проверяем, что пользователь с таким логином, email или телефоном уже не существует
while ($line = fgets($users_file_handle)) {
  $fields = explode(';', $line);
  if ($fields[0] == $login_email_phone) {
    echo "Пользователь с таким логином, email или телефоном уже существует.";
    exit;
  }
}

// Закрываем файл для чтения и открываем для записи
fclose($users_file_handle);
$users_file_handle = fopen($users_file, 'a');

// Пишем нового пользователя в файл
fwrite($users_file_handle, $login_email_phone . ';' . $password . "\n");

// Закрываем файл
fclose($users_file_handle);

// Выводим сообщение об успешной регистрации
echo "Регистрация прошла успешно.";
