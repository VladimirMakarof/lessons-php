<?php
// обработчик данных формы
$post = $_POST;
var_dump($post['user_name']);

// информация о загруженном файле
$files = $_FILES; // супер глобальный массив с информацией о файле 
var_dump($files['picture']); // из html значение атрибута name="picture[]"
var_dump($files);

$tmp_name = $files['picture']['tmp_name'];
$file_name = $files['picture']['name']; // pic.png
// до перемещения необходимо проверить на:
// тип, размер и наличие ошибок загрузки

// новое имя файл, возможные варианты создания уникальных имен файлов
$ext = pathinfo($file_name, PATHINFO_EXTENSION); // вернет расширение файла (#png)
// $file_name = microtime() . $file_name; //  генерирует уникальное имя файла на основе текущего времени
$file_name = md5(microtime() . $file_name) . ".$ext";


// foreach ($tmp_name as $key => $tmp_file) {
//     $file_name = $files['picture']['name'][$key];
//     if (move_uploaded_file($tmp_file, 'images/' . $file_name)) {
//         echo 'Файл успешно загружен';
//     } else {
//         echo 'Ошибка загрузки файла ';
//     }
// }

// "images/$file_name"
// 'images/' . $files['picture']['name']

if (move_uploaded_file($tmp_name, "images/$file_name")) {
    echo 'Файл успешно загружен';
} else {
    echo 'Попробуйте еще раз';
}

/*function load_file($files_info){ // $files['picture']
    // проверки на тип, размер и наличие ошибок загрузки
    // проверки можно реализовать в отдельных функциях
    if (код_ошибки != 0){
        echo "Ошибка загрузки: ";
        return;
    }
    if (!is_size()){
        echo 'Слишком большой размер файла';
        continue;
    }
    // проверка на тип

    // задать новое имя  файлу
    // перемещение
    if (!move_uploaded_file(временная_папка, папка_назначения) {
        echo 'Попробуйте еще раз';
        return;
    }
    echo 'Файл успешно загружен';
}*/


//function is_size($file_size, $size) {
//    return
//}