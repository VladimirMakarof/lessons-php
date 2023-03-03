<?php
// ЗАДАЧА 1
// Дан массив $numbers
$numbers = [5, 78, -200, 89, -14, 0, 73, -33, -4];

// Объявить новый массив, в который войдут только положительные числа из $numbers

$new_arr = []; // объявили новый пустой массив 
foreach ($numbers as $number){
    if($number > 0){
        $new_arr[] = $number;
    }
}
var_dump($new_arr);

// ЗАДАЧА 2
// Дан массив $tours.
$tours = [
    [
        'id' => 1,
        'city' => 'Лондон',
        'price' => 3600,
        'country'=> 'Великобритания'
    ],
    [
        'id' => 2,
        'city' => 'Осло',
        'price' => 2800,
        'country'=> 'Норвегия'
    ],
    [
        'id' => 3,
        'city' => 'Сидней',
        'price' => 4100,
        'country'=> 'Австралия'
    ],
    [
        'id' => 4,
        'city' => 'Канберра',
        'price' => 3900,
        'country'=> 'Австралия'
    ]
];
foreach($tours as $tour){
    if($tour['country']!='Австралия'){
        $tour['price'] *= 1.10;
    }
    elseif($tour['country']=='Австралия'){
        $tour['price'] *= 1.12;
    }
  // var_dump($tour['price']);
   var_dump($tour);
}
// Увеличить стоимость каждого тура на 10%. Для австралийских туров на 12%

// ЗАДАЧА 3 (ДЗ)
// Вывести в html информацию о товарах:
$items = [
    [
        'id' => 1,
        'title' => 'Flute',
        'price' => 20000,
        'img' => 'flute.jpg',
        'description' => [
            'color' => 'white',
            'material' => 'bamboo'
        ]
    ],
    [
        'id' => 2,
        'title' => 'Guitar',
        'price' => 18000,
        'img' => 'guitar.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'linden'
        ]
    ],
    [
        'id' => 3,
        'title' => 'Drum',
        'price' => 68000,
        'img' => 'img/hedgehog.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'steel'
        ]
    ],
];
?>
<table>
    <tr>
        <th>Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Description</th>
    </tr>
    <?php foreach($items as $item): ?>
        <tr>
            <td><?php echo $item['title']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td><img src="<?php echo $item['img']; ?>" alt="<?php echo $item['title']; ?>" width="100"></td>
            <td>
                <ul>
                    <li>Color: <?php echo $item['description']['color']; ?></li>
                    <li>Material: <?php echo $item['description']['material']; ?></li>
                </ul>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
