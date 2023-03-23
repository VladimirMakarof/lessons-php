<?php
// нельзя создать экземпляр абстрактного класса
// абстрактный класс может содержать абстрактные методы,
// т.е. методы без реализации
abstract class Animal {
    protected $name = 'Без имени';
    protected $age;

    public function __construct(float $age){
        $this->age = $age;
    }
    // абстрактный метод - метод без реализации
    abstract public function run();
    public function jump(){
        echo 'животное прыгает';
    }
}
