<?php
class Headmaster extends Person
{
  public function setClassesStart()
  {
    echo 'Занятия начались !';
  }
  public function setClassesEnd()
  {
    echo 'Занятия закончены !';
  }
  public function setAge(int $age)
  {
    if ($age < 35) {
      echo 'Директор должен быть не менее 35 лет';
      return false;
    }
    $this->age = $age;
    return true;
  }
}
