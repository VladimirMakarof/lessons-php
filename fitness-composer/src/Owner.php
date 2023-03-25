<?php

namespace vladimir\fitness;

class Owner
{
    private string $name;
    private string $surname;
    private int $birthYear;

    public function __construct(string $name, string $surname, int $birthYear)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthYear = $birthYear;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function getBirthYear()
    {
        return $this->birthYear;
    }
}
