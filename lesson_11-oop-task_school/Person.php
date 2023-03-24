<?php
abstract class Person
{
  private string $name; // свойство 
  protected int $age;

  public function getName()
  {
    return $this->name;
  }

  public function setName(string $name) // аргумент 
  {
    if (strlen($name) < 1) {
      echo 'Длина имени должна быть не менее 1 символа';
      return false;
    }
    $this->name = $name;
  }
  public function getAge()
  {
    return $this->age;
  }
  public function setAge(int $age)
  {
    if (!is_int($age) || $age < 7 || $age > 18) {
      echo 'Возраст должен быть положительным целым числом';
      return false;
    }
    $this->age = $age;
  }
}
