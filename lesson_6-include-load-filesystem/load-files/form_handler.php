<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'Доступ запрещен';
    exit;
}

function checkUploadError($error, $fileName)
{
    if ($error !== UPLOAD_ERR_OK) {
        echo "Ошибка при загрузке файла '$fileName': " . $error;
        return false;
    }
    return true;
}

function checkFileSize($size, $fileName)
{
    if ($size > 5 * 1024 * 1024) {
        echo "Файл '$fileName' слишком большой, максимальный размер - 5 МБ";
        return false;
    }
    return true;
}

function checkFileExtension($fileName, $allowedExtensions)
{
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if (!in_array($fileExt, $allowedExtensions)) {
        echo "Недопустимое расширение файла '$fileName', разрешены только файлы с расширениями: " . implode(', ', $allowedExtensions);
        return false;
    }
    return true;
}

function saveFile($tmpName, $fileName, $fileExt)
{
    $newFileName = uniqid() . '.' . $fileExt;
    $destination = 'images/' . $newFileName;
    if (move_uploaded_file($tmpName, $destination)) {
        echo "Файл '$fileName' успешно загружен!";
    } else {
        echo "Ошибка при сохранении файла '$fileName'!";
    }
}

$post = $_POST;
var_dump($post['user_name']);

$files = $_FILES['picture'];
$fileCount = count($files['name']);
var_dump($files);
var_dump($fileCount);

$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

for ($i = 0; $i < $fileCount; $i++) {
    $fileName = $files['name'][$i];
    $fileSize = $files['size'][$i];
    $fileError = $files['error'][$i];
    $tmpName = $files['tmp_name'][$i];

    if (!checkUploadError($fileError, $fileName)) {
        continue;
    }

    if (!checkFileSize($fileSize, $fileName)) {
        continue;
    }

    if (!checkFileExtension($fileName, $allowedExtensions)) {
        continue;
    }

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    saveFile($tmpName, $fileName, $fileExt);
}


// $tmp_name = $files['picture']['tmp_name'];
// $file_name = $files['picture']['name']; // pic.png
// до перемещения необходимо проверить на:
// тип, размер и наличие ошибок загрузки

// новое имя файл, возможные варианты создания уникальных имен файлов
// $ext = pathinfo($file_name, PATHINFO_EXTENSION); // вернет расширение файла (#png)
// $file_name = microtime() . $file_name; //  генерирует уникальное имя файла на основе текущего времени
// $file_name = md5(microtime() . $file_name) . ".$ext";


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

// if (move_uploaded_file($tmp_name, "images/$file_name")) {
//     echo 'Файл успешно загружен';
// } else {
//     echo 'Попробуйте еще раз';
// }

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
