<?php
// Storage.php
class Storage
{
	// функция внутри класса это метод
	// переменная внутри класса это свойства 
	public $name = 'Хранилище';
	// установка значения по умолчанию 
	public $article = []; // название статьи => статья (объект)


	//! добавление в хранилище 
	public function add_article(Article $article)
	{
		$this->article[$article->title] = $article;
		$this->article[] = $article;
		// [
		// название статей => статья 
		//]
	}
	//! получение по названию статьи 
	public function get_by_title(string $title)
	{
		foreach ($this->article as $article) {
			if ($article->title === $title) {
				return $article;
			}
		}
		return null;
	}

	// получение статьи по имени автора 
	public function get_by_author_name(string $name)
	{
		$articles = [];
		foreach ($this->articles as $article) {
			if ($article->name === $name) {
				$articles[] = $article;
			}
		}
		return $articles;
	}
}
/*class Storage { // $name будет таким каким мы передадим 
	public $name = 'Хранилище';
	// установка значения по умолчанию 
	public function __construct(string $name)
	$this->name = $name;
}*/