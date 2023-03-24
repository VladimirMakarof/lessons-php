<?php
class Teacher extends Person implements Teaching
{
  private string $subject;

  // дублирование кода !! чтобы его избежать, нужно создавать отдельные методы или наследование 
  public function __construct(string $subject)
  {
    $this->subject = $subject;
    $this->setName($subject);
  }
  public function setSubject(string $subject)
  {
    if (strlen($subject) < 3) {
      echo 'Название предмета должно содержать не менее 3 букв';
    }
    $this->subject = $subject;
    return true;
  }
  public function getSubject()
  {
    return $this->subject;
  }
  public function teach(CanStudy $student)
  {
    $student->study();
  }
  public function setAge(int $age)
  {
    if ($age < 18) {
      echo 'Учитель должен быть не мене 18 лет';
      return false;
    }
    $this->age = $age;
    return true;
  }
}
