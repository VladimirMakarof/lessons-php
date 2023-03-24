<?php
require_once 'Animal.php'; // class Cat наследуется от Animal 

class Cat extends Animal
{

    public function run() // обязаны написать реализацию абстрактного метода run() так как в родительском классе есть абстрактный метод 
    {
        echo 'реализация в классе Cat';
    }

    // переопределили метод родителя
    public function jump()
    {
        // parent::jump(); // 'животное прыгает' - расширение метода
        echo 'прыжки кота отличаются';
    }
}
