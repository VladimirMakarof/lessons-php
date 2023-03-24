<?php
class Pupil extends Person implements CanStudy
{
  private string $subject;
  private int $knowledgeLevel = 0;

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
  public function getknowledgeLevel()
  {
    return $this->knowledgeLevel;
  }
  public function study()
  {
    $this->knowledgeLevel += 1;
  }
}
