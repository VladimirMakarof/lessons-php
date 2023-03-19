<?php
$file_name = 'file.txt'; // объявляем переменную, имя файла

$data = 'Данные для записи'; // данные для записи в файле на сервере
// запись данных в файл через функцию file_put_contents
// флаг FILE_APPEND - в случае если нам нужно не перезаписать, а дописать в конце файла 
// флаг LOCK_EX - в то время когда будет осуществляться запись файл будет заблокирован 
//  `!==` false функция вернет false в случае если не удалось 

//if (!file_put_contents($file_name, $data, FILE_APPEND | LOCK_EX)) {
if (file_put_contents($file_name, $data . '; ', FILE_APPEND | LOCK_EX) !== false) {
    echo 'Данные успешно записаны<br>';
}

$file_name = 'file2.txt';
$data = 'Данные для записи';
// "\n", "\r\n", флаг PHP_EOL = \n - конец текущей строки, перенос строки 
if (file_put_contents($file_name, $data . PHP_EOL, FILE_APPEND | LOCK_EX) !== false) {
    echo 'Данные с переносом строки успешно записаны<br>';
}

//! чтение из файла в строку
$file_name = 'file.txt';

// file_get_contents
$str_from_file = file_get_contents($file_name);
echo $str_from_file;

// чтение из файла в массив (каждая строка - элемент массива)!
// флаг  FILE_SKIP_EMPTY_LINES удаляет пустые строки 
// флаг FILE_IGNORE_NEW_LINES не учитывать перенос строки, пробелы после текст  
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
