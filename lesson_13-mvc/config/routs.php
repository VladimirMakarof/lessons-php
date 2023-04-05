<?php
// / GET - IndexController index() Главная страница
// /books GET - BookController books() Все книги
// /book?id=12 GET - BookController bookById() Книга по id
return [
    '/' => [
        'method' => 'GET',
        'controller' => 'Vladimir\Lesson13Mvc\Controllers\IndexController::index'
    ],
    '/books' => [
        'method' => 'GET',
        'controller' => 'Vladimir\Lesson13Mvc\Controllers\BookController::books'
    ],
    '/book' => [
        'method' => 'GET',
        'controller' => 'Vladimir\Lesson13Mvc\Controllers\BookController::bookById'
    ]
];
// запрос '/books' будет создан BookController и будет вызван метод books 