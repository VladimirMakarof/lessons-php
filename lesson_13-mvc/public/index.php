<?php

use Vladimir\Lesson13Mvc\BookController;
use Vladimir\Lesson13Mvc\Controllers\IndexController;

require_once __DIR__ . '/../vendor/autoload.php';

// единая точка входа в приложение (front-controller)
// все запросы перенаправляются на единую точку входа (index.php)
// сервер запускается из папки public (корневая директория сервера)

// php -S localhost:8080 index.php
var_dump($_SERVER['REQUEST_URI']);

$router = new \Vladimir\Lesson13Mvc\Routing\Router(require_once __DIR__ . '/../config/routs.php');

$router->run();

// Get - IndexController index() Главная страинца 
// /books Get - BookController books() все книги
// /book?id=12 GET - BookController bookId() книга по id 