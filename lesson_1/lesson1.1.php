<?php
$str = '  34'; // 34
$int_from_str = (int) $str;
var_dump($int_from_str); // 34

$str = '34mebmory';
var_dump((int) $str); // 34

$str = 'b45';
var_dump((int) $str); // 0

$name = 'Дмитрий';
$greeting = "Добро пожаловать, $name";
echo $greeting;

// null
$id; // null
unset($greeting); // null
$book = null; // null

if (isset($id)) {
    echo 'Значение id было присвоено';
} else {
    echo 'Значение id не было присвоено и равно null';
}


$a = 30;
$a += 10;


// <=> возвращает тип int (-1, 0, 1)
var_dump(45 <=> 10); // первое больше 1
var_dump(45 <=> 45); // равны 0
var_dump(10 <=> 45); // первое меньше -1
$a = 0;
var_dump(!$a); // true

$a = '0';
var_dump(!$a); // true

// xor - исключающее или
$a = 55;
$b = 45;
var_dump($a === 55 xor $b === 45 );

$login;
$login = isset($login) ? $login : 'Гость';
var_dump($login);

// начиная с 7.0 - оператор объединения с null
// вместо isset($login) ?
$login;
$login = $login ?? 'Гость';  // Гость

$login = 'qwerty';
$pwd = '123';

if ($login === 'qwe' && $pwd === '12345') {
    echo 'Авторизация прошла успешно';
} else {
    echo 'Ошибка авторизации';
}

// если логин равен 'qwe' и пароль равен '12345',
// значит пользователь авторизовался успешно
// если пользователь ввел неверные данные сообщить ему об этом

$month = 'Январь';

