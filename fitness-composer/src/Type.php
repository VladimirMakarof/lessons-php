<?php

namespace vladimir\Fitness;

use vladimir\Fitness\Titles\TypeTitles;
use vladimir\Fitness\Titles\ZoneTitles;

class Type
{
    private string $name;
    private array $zones = [];
    private int $startTime;
    private int $endTime;

    private function __construct(
        string $name,
        int $startTime,
        int $endTime,
        array $zones
    ) {
        $this->name = $name;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->zones = $zones;
    }

    //Разовый. По разовому абонементу клиенты могут посещать бассейн и тренажерный зал с 8 до 22 часов.
    //Дневной. По данному абонементу клиенты могут посещать тренажерный зал и групповые занятия (но не бассейн) с 8 до 16 часов.
    //Полный. По данному абонементу клиенты могут посещать тренажерный зал, бассейн и групповые занятия с 8 до 22 часов.
    // фабричный метод
    // статические методы (static) можно вызывать без создания объекта, статические методы принадлежат классу, если конструктов приватный то объекты будут создаваться статические 
    // статические методы: 1. создают объекты 2. занимаются подсчётами
    public static function getType(string $name)
    { // $name - название типа абонемента
        if ($name === TypeTitles::FULL) {  // обращение к константе, название класса :: и название константы 
            return new Type($name, 8, 22, [ZoneTitles::GROUP, ZoneTitles::GYM, ZoneTitles::POOL]);
        }
        if ($name === TypeTitles::DAY) {
            return new Type($name, 8, 16, [ZoneTitles::GROUP, ZoneTitles::GYM]);
        }
        if ($name === TypeTitles::ONCE) {
            return new Type($name, 8, 22, [ZoneTitles::POOL, ZoneTitles::GYM]);
        }
    }
}

//Тип
//название
//зоны
//время
