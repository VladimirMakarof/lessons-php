<?php
$file_name = 'file.txt';

$data = 'Данные для записи';
// запись данных в файл
//if (!file_put_contents($file_name, $data, FILE_APPEND | LOCK_EX)) {
if (file_put_contents($file_name, $data . ';', FILE_APPEND | LOCK_EX) !== false ) {
    echo 'Данные успешно записаны<br>';
}

$file_name = 'file2.txt';
$data = 'Данные для записи';
// "\n", "\r\n", PHP_EOL - конец текущей строки
if (file_put_contents($file_name, $data . PHP_EOL, FILE_APPEND | LOCK_EX) !== false ) {
    echo 'Данные с переносом строки успешно записаны<br>';
}

// чтение из файла в строку
$file_name = 'file.txt';

$str_from_file = file_get_contents($file_name);
echo $str_from_file;

// чтение из файла в массив (одна строка - элемент массива)!
$file_name = 'file2.txt';
$arr_from_file = file($file_name, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
var_dump($arr_from_file);


/*
 * lock1 = 0001
 * append = 0010
 * create = 0100
 * lock2 = 1000
 *
 * flag = 0010 | 0001 (0011)
 * 0010
 * 0001
 * 0011
 *  */


