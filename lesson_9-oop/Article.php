<?php
// Article.php
class Article
{
	public $author;
	public $title;
	public $text;
	public $created;

	public function __construct(Author $author, string $title) // вызов конструктора с 2 аргументами, $author должен быть экземпляром класса Author, $title должен быть строкой 
	{ // переопределение конструктора 
		// по умолчанию конструктор есть у всех классов 
		// $this -псевдопеременная (ссылка на текущий объект)
		$this->author = $author; // присваиваем значение 
		$this->title = $title;
		// в конструкторе может быть любые инструкции 
		$this->created = new DateTime();
	}
}
