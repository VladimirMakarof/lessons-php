<?php
namespace Animals;

// импортировали класс Animals\Wild\Dog
use Animals\Wild\Dog;
// импортировали класс Farm\People\Farmer
// с псевдонимом Owner
use Farm\People\Farmer as Owner;

class Mouse{/* описание класса */}

// неполное имя
$jerry = new Mouse();
var_dump($jerry);

require_once 'Dog.php';

// полное имя
// $jack = new Wild\Dog();

// через импорт (use)
$jack = new Dog();
var_dump($jack);

require_once  'Farmer.php';

// абсолютное имя
// $farmer = new \Farm\People\Farmer();

// через импорт (use) с псевдонимом,
// теперь обращаться к классу нужно по имени Owner
$farmer = new Owner();
var_dump($farmer);