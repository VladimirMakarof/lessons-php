<?php
// main.php
require_once 'Author.php';
require_once 'Article.php';
require_once 'Storage.php';
// создание объекта (экземпляра класса Author)
// new вызов конструктора; 
$oleg = new Author(); // что бы создать объект (экземпляр класса) 
$misha = new Author(); // new Author() - вызов конструктора 

// обращение к свойствам объекта: переменная -> имя-свойства (без $)
// установить значение свойства
$oleg->name = 'Олег'; // устанавливаем значение 
$misha->name = 'Михаил';

$oleg->age = 20;
$misha->age = 28;

$oleg->rating = 4;

// получить значение свойства 
var_dump($misha->name);

$php = new Article($oleg, 'PHP 8'); // вызов конструктора с аргументами Author $author, string $title
$js = new Article($misha, 'VUE JS');


//var_dump($oleg, $misha);
//var_dump($js->author) выведет весь объект 
//var_dump($js->author->name) выведет только имя 

$storage1 = new Storage();
// вызываем метод 
$storage1->add_article($js); // [title=> 'vue js, author =>']
var_dump($storage1->article);
