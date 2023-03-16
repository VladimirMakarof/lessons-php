<?php

$tours = [
    [
        'id' => 1,
        'city' => 'Лондон',
        'price' => 3600,
        'country' => 'Великобритания',
        'img' => 'london.jpd'
    ],
    [
        'id' => 2,
        'city' => 'Осло',
        'price' => 2800,
        'country' => 'Норвегия',
        'img' => 'oslo.jpg'
    ],
    [
        'id' => 3,
        'city' => 'Сидней',
        'price' => 4100,
        'country' => 'Австралия',
        'img' => 'sidney.jpg'
    ],
    [
        'id' => 4,
        'city' => 'Канберра',
        'price' => 3900,
        'country' => 'Австралия',
        'img' => 'canberra.jpg'
    ]
];

// отправка данных о турах
$server = $_SERVER; // переопределяем глобальный массив 
if ($server['REQUEST_METHOD'] === 'GET') { // проверяем запрос, если пришёл методом get то мы начинаем формировать тело сообщения  
    $get = $_GET;
    if (isset($get['country'])) { // проверяем если в массиве get есть элемент пары с ключом country
        echo json_encode(get_tours_by_country($get['country'])); // json_encode преобразует переданные данные в json строку (json сериализация), всё что после (?) попадает в супер глобальный массив get, получаем значение country и передаём в функцию get_tours_by_country
    } else {
        echo json_encode($tours); // вызываем функцию json_encode и передаём массив, на тут случай если мы хотим получить все туры без какого либо параметра 
    }
    // echo json_encode($tours); // преобразование в json строку или json сериализация 
}

function get_tours_by_country(string $country): array // функция которая вернет массив с выбранным туром, получили 
{
    $result_arr = [];
    global $tours; // из функции нельзя обратится к внешней переменной, global позволяет обратиться к внешней переменной 
    foreach ($tours as $tour) {
        if ($country === $tour['country']) {
            $result_arr[] = $tour;
        }
    }
    return $result_arr; // формируем туры 
}
