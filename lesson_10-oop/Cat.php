<?php
require_once 'Animal.php';

class Cat extends Animal
{

    public function run()
    {
        echo 'реализация в классе Cat';
    }

    // переопределили метод родителя
    public function jump()
    {
        // parent::jump(); // 'животное прыгает'
        echo 'прыжки кота отличаются';
    }
}
