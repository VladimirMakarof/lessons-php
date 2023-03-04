<?php
// 1. Напишите функцию, которая будет принимать на вход 3 аргумента
// с типом float и возвращать минимальное значение.

// Вариант решения 1 задачи 1
function f1(float $a, float $b, float $c)
{
    if ($a < $b && $a < $c) {
        return $a;
    }
    if ($b < $c) {
        return $b;
    }
    return $c;
}
// Вариант решения 2 задачи 1

function f1_1(float ...$args): float
{
    return min(...$args);
}

// 2. Напишите функцию, которая принимает на вход два аргумента (типа int или float)
// по ссылкам и умножает каждый из них на 2.

// Вариант решения 1 задачи 2
function f2(int &$x, int &$y)
{
    $x = 2 * $x;
    $y = 2 * $y;
}
// Вариант решения 2 задачи 2. добавить проверку переданных аргументов на то, что они являются числами (int или float) и выдавать ошибку, если это не так

function f2_2(&$x, &$y)
{
    if (!is_numeric($x) || !is_numeric($y)) {
        throw new InvalidArgumentException('Аргументы должны быть числами');
    }
    $x *= 2;
    $y *= 2;
}

// Вариант решения 3 задачи 2. использовать типизацию аргументов и возвращаемого значения:
// void - это тип данных, который используется в языках программирования для обозначения отсутствия возвращаемого значения функцией или методом.

function f2_3(float &$x, float &$y): void
{
    $x *= 2;
    $y *= 2;
}

function get_all_tasks()
{
    return [
        [
            'title' => 'Задача 1',
            'date' => date_create('yesterday'),
            'participants' => ['Артур', 'Полина'],
            'closed' => false
        ],
        [
            'title' => 'Задача 2',
            'date' => date_create('tomorrow'),
            'participants' => [],
            'closed' => false
        ],
        [
            'title' => 'Задача 3',
            'date' => date_create('tomorrow'),
            'participants' => ['Артур', 'Глеб'],
            'closed' => false
        ],
        [
            'title' => 'Задача 4',
            'date' => date_create('yesterday'),
            'participants' => ['Павел', 'Полина'],
            'closed' => true
        ]
    ];
}
// Задача 3:
// Написать функцию, которая принимает массив и возвращает новый массив,
// в который войдут (выбрать один любой вариант):
// 3.1. новые задачи (Дата задачи > date_create())
// 3.2. закрытые задачи (со значением closed === true)
// 3.3. невыполненные задачи (со значением closed === false и датой меньше date_create())

// 3.1.  get_new_tasks новые задачи (Дата задачи > date_create())
function get_new_tasks($array)
{

    // реализация
    $new_arr = [];
    foreach ($array as $element) {
        if ($element['date'] > date_create()) {
            $new_arr[] = $element;
        }
    }
    return $new_arr;
}


var_dump(get_new_tasks(get_all_tasks()));

// 3.2. get_closed_tasks закрытые задачи (со значением closed === true)

function get_closed_tasks($array)
{

    // реализация
    $new_arr = [];
    foreach ($array as $element) {
        if ($element["closed"] === true) {
            $new_arr[] = $element;
        }
    }
    return $new_arr;
}


var_dump(get_closed_tasks(get_all_tasks()));

// 3.3. get_uncompleted_tasks невыполненные задачи (со значением closed === false и датой меньше date_create())

function get_uncompleted_tasks($array)
{
    // реализация
    $new_arr = [];
    foreach ($array as $element) {
        if ($element['date'] < date_create() && $element['closed'] === false) {
            $new_arr[] = $element;
        }
    }
    return $new_arr;
}


var_dump(get_uncompleted_tasks(get_all_tasks()));


// Задача 4:
// Написать функцию, которая принимает массив и возвращает новый массив,
// в который войдут задачи, в которых имя участника равно значению $name:

//  Вариант решения 1 задачи 4
function get_tasks_by_name($array, $name)
{
    $return_names = [];
    foreach ($array as $tasks) {
        foreach ($tasks['participants'] as $names) {
            if ($names === $name) {
                $return_names[] = $tasks;
            }
        }
    }
    return $return_names;
}
var_dump(get_tasks_by_name(get_all_tasks(), 'Артур'));

//  Вариант решения 2 задачи 4

function get_tasks_by_name_2(
    // 1 Объявляем функцию get_tasks_by_name, принимает два аргумента: $tasks (массив задач) и $name (имя участника).
    $tasks,
    $name
) {
    // 2. Внутри функции мы используем встроенную функцию array_filter, чтобы создать новый массив задач, которые удовлетворяют заданным условиям.
    return array_filter($tasks, function ($task) use ($name) {
        // 3. В качестве первого аргумента array_filter мы передаем массив задач $tasks.
        // 4. В качестве второго аргумента мы передаем анонимную функцию, которая будет применяться к каждому элементу массива $tasks.
        return in_array($name, $task['participants']);
        // 5. Внутри анонимной функции мы используем встроенную функцию in_array, чтобы проверить, содержит ли массив $task['participants'] имя участника $name.
        // 6. Мы используем ключевое слово use для передачи переменной $name извне анонимной функции.
        // 7. Функция array_filter возвращает новый массив задач, который удовлетворяет условию, заданному в анонимной функции.
        // 8. Функция get_tasks_by_name возвращает новый массив задач.
    });
}
