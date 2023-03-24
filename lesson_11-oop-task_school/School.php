<?php
class School
{
  private string $name;
  private Headmaster $headmaster;
  private array $teachers;
  private array $pupils;

  public function __construct(string $name, Headmaster $headmaster, $teachers, $pupils)
  {
    $this->name = $name;
    $this->setHeadmaster($headmaster);
    $this->teachers = $teachers;
    $this->pupils = $pupils;
  }
  public function setHeadmaster(Headmaster $headmaster)
  {
    $this->headmaster = $headmaster;
  }
  public function dayOfSchool()
  {
    $this->headmaster->setClassesStart();
    foreach ($this->teachers as $teacher) {
      foreach ($this->pupils as $pupil) {
        if ($teacher->getSubject() === $pupil->getSubject()) {
          $teacher->teach($pupil);
        }
      }
    }
    $this->headmaster->setClassesEnd();
  }
}
