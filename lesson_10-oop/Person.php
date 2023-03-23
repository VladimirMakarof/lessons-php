<?php
class Person
{
    // public модификатор доступа позволяет обращаться к свойству или методу из любой части программы
    // private модификатор доступа позволяет обращаться к свойству или методу только внутри класса
    // protected модификатор доступа позволяет обращаться к свойству или методу внутри текущего класса и внутри дочерних классов

    protected $name;
    private $age;
    public $email;
    public function __construct(string $email)
    {
        $this->email = $email;
    }
    public function setAge(int $age) // setAge() устанавливает значение $age
    {
        if ($age < 18) {
            echo 'Значение age не может быть меньше 18';
            return;
        }
        $this->age = $age;
    }
    public function getAge() // getAge() вернёт значение $age
    {
        return $this->age;
    }
}
