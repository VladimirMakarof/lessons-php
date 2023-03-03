### в моём файле animals-data.php только один массив без имени, а если будет 2 массива как к ним обращаются ?

Если в файле animals-data.php будет несколько массивов, то каждый массив должен иметь своё имя. В PHP массивы задаются с помощью квадратных скобок [], поэтому можно обернуть каждый массив в свои скобки и задать имя:

```php

return [
    'массив1' => [
        'id'=>1,
        'name'=>'Белка',
        'img'=>'squirrel.jpg'
    ],
    'массив2' => [
        'id'=>2,
        'name'=>'Заяц',
        'img'=>'rabbit.jpg'
    ],
    'массив3' => [
        'id'=>3,
        'name'=>'Ёж',
        'img'=>'hedgehog.jpg'
    ]
];


```

Затем, чтобы обратиться к нужному массиву, можно использовать его имя:

```php

$animals1 = require_once $_SERVER['DOCUMENT_ROOT'] . '/data/animals-data.php';
$array1 = $animals1['массив1'];

$animals2 = require_once $_SERVER['DOCUMENT_ROOT'] . '/data/animals-data.php';
$array2 = $animals2['массив2'];


```

Или же можно сразу обращаться к нужному массиву в цикле:

```php

$animals = require_once $_SERVER['DOCUMENT_ROOT'] . '/data/animals-data.php';
foreach ($animals['массив1'] as $animal) {
    // действия для массива "массив1"
}

foreach ($animals['массив2'] as $animal) {
    // действия для массива "массив2"
}


```
