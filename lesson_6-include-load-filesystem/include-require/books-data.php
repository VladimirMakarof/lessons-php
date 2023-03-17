<?php
function get_books() :array
{

    return [
        [
            'id' => 1,
            'title' => 'Выразительный JavaScript',
            'author' => 'Хавербеке Марейн',
            'img' => 'js.png',
            'price' => 1200
        ],
        [
            'id' => 2,
            'title' => 'Большая книга CSS3',
            'author' => 'Дэвид Макфарланд',
            'img' => 'css.png',
            'price' => 300
        ],
        [
            'id' => 3,
            'title' => 'PHP 7',
            'author' => 'Котеров, Симдянов',
            'img' => 'php.png',
            'price' => 1400
        ]
    ];
}