<?php
// Developer.php
// класс Developer наследует (расширяет) класс Person
// Person - родительский класс (суперкласс)
// Developer - дочерний класс, будут добавленные уникальные свойства и методы 
// при наследовании дочерний класс наследует все методы и свойства родительского класса 
class Developer extends Person
{
    private $skills = [];
    private $rating;
    public function __construct(string $email, int $rating)
    {
        parent::__construct($email); // вызов конструктора родителя
        $this->rating = $rating;
    }
}
