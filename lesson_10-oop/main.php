<?php
require_once 'Person.php';
require_once 'Developer.php';
require_once 'Cat.php';

$person = new Person('qwerty@gmail.com');
// доступ к свойству запрещен модификатором private
// $person->age = -20;
$person->setAge(-20);
$person->setAge(20);

// доступ к свойству запрещен модификатором private
// var_dump($person->age);
var_dump($person->getAge());

$developer = new Developer('aaa@gmail.com', 4);
var_dump($developer);

// Animals
$animal_type = 'cat';

if ($animal_type === 'dog') {
    $animal = new Dog(1);
} else {
    $animal = new Cat(1);
}

$animal->run();
$animal->jump();
