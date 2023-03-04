<?php

declare(strict_types=1); //! режим строгой типизации
// функцию, которая принимает на вход 2 числа
// и возвращает результат сложения этих чисел

$num1 = 2;
$num2 = 10;

// объявление функции
function get_sum(int|float $a, int|float $b)
{
    return $a + $b;
}

// вызов функции
var_dump(get_sum(56, 1)); // 57

$x = 6;
$y = -2;
var_dump(get_sum($x, $y)); // 4

function greeting($name = 'Гость')
{
    return "<h1>Добро пожаловать, $name</h1>";
}

echo greeting();
echo greeting('Глеб');
echo greeting('Ирина');

function greeting2($email, $name = 'Гость')
{
    return "<h1>Добро пожаловать, $name</h1>
            <p>Ваш email: $email</p>";
}

// echo greeting2(); Uncaught ArgumentCountError: Too few arguments to function
echo greeting2('qwe@mail.com');
echo greeting2('qwe@mail.com', 'Глеб');

function minus($a, $b = 0)
{
    return $a - $b;
}

// var_dump(minus()); // Uncaught ArgumentCountError:
minus(4);
var_dump(minus(4, 1)); // 3
var_dump(minus(4, 2, 6)); // 2


function add_word(string &$name)
{
    $name .= ' Большой';
}

$name = 'Глеб';
add_word($name);

$some_var = 'Торт';
add_word($some_var);

$lang = 'php';

add_word($lang);
var_dump($name);
var_dump($some_var);
var_dump($lang);

//
function division($a, $b): int|bool|float
/* :int должна вернуть int (PHP 7.0)*/
/* :?int должна вернуть int или null (PHP 7.1) */
/* :int|bool|float должна вернуть int, bool или float (PHP 8.0)*/
{
    if ($b === 0) return false;
    return $a / $b;
}

$num1 = 9;
$num2 = 0;
var_dump(division(9, 0)); // false

var_dump(division(6, 2)); // 3


function get_data()
{
    return ['Глеб', 20];
}
//$data = get_data();
//$name = $data[0]; // Глеб
//$age = $data[1]; // 20

list($name, $age) = get_data(); //['Глеб', 20];
var_dump($name, $age);

function sum1(...$nums)
{ // [1, 78, 61]
    $acc = 0;
    foreach ($nums as $num) {
        $acc += $num;
    }
    return $acc;
}

var_dump(sum1(1, 2, 3, 4));
var_dump(sum1(1));
var_dump(sum1(1, 78, 61));

function create_greeting(string $name = 'Гость')
{
    return "<h2>Добро пожаловать, $name</h2>";
}
echo create_greeting();
$func_name = 'create_greeting';
echo $func_name();

$some_var = 'create_greeting';
echo $some_var();


$sqrt = function (int $a) {
    return $a * $a;
};
var_dump($sqrt(34));
// [0, -2, 3], function (int $a) {return $a * $a;}
function change_arr(array &$arr, callable $action)
{
    foreach ($arr as &$item) {
        $item = $action($item);
    }
}
$array = [0, -2, 3];
change_arr($array, $sqrt);
var_dump($array);

change_arr($array, function ($a) {
    return $a + 10;
});
var_dump($array); // [10, 14, 19]
