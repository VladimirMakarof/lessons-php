[Функции, определяемые пользователем](https://www.php.net/manual/ru/functions.user-defined.php)

## Синтаксис именованных функций:

1. Внутри функции можно использовать любой корректный PHP-код, в том числе другие функции и классы.
2. Функция может быть объявлена в зависимости от какого-либо условия

- Именованные функции можно вызывать как до так и после объявления
- Из функции можно вернуть только 1 значение, ли как массив

```php
function func($arg*1, $arg_2, /* ..., \_/ $arg_n) {
// тело функции (инструкции функции)
return возвращаемое значение;
}

        $status = true;

        if ($status) {
            function func() {
                функция будет объявлена, если значение $status true
            }
        }


        function func() {
            function inner_func() {
                функция будет объявлена после вызова функции func
            }
        }

        func();
```

## Передача аргументов в функцию

```php

        function sum($a, $b) {} // объявление
        sum(4, 7); // вызов

```

## Передача аргументов в функцию (указание типа данных аргумента)

1.  PHP 5 тип аргумента: array, имя класса
2.  PHP 5.4 тип аргумента: array, имя класса + callable
3.  PHP 7.0 тип аргумента: array, имя класса, callable + скалярные типы
4.  PHP 8.0 позволяет указать несколько типов аргумента, например int|float

```php

        function sum(int|float $a, int|float $b) {} // объявление
        sum(4, 7.4); // вызов

```

## Передача аргументов в функцию (значения по умолчанию)

1.  Значение по умолчанию должно быть константным выражением
2.  До PHP 8 необязательные аргументы (со значениями по умолчанию) должны идти после обязательных (без значения по умолчанию)

```php

        function create_greeting(string $name='Гость') {
            return "<h2>Добро пожаловать, $name</h2>";
        }

        echo create_greeting('Глеб'); // Добро пожаловать, Глеб
        echo create_greeting(); // Добро пожаловать, Гость
```

## Передача аргументов в функцию (передача по ссылке) - &

1.  Позволяет изменить значение аргумента внутри функции

```php

        $name = 'Глеб';

        function add_word(string &$name) {
            $name .= ' Большой';
        }

        add_word($name);

        var_dump($name); // Глеб Большой

```

## Передача аргументов в функцию (списки аргументов переменной длины) - ...

1.  Аргументы будут переданы в виде массива

```php

        function sum(...$nums) {
            $acc = 0;
            foreach ($nums as $num) {
                $acc += $num;
            }
            return $acc;
        }

        var_dump(sum(1, 2, 3, 4)); // 10
```

## Возврат значений (return)

1.  Возвращаемые значения могут быть любого типа
2.  Если конструкция return не указана, то функция вернёт значение null
3.  return приводит к завершению выполнения функции

```php

        function square($num){
            return $num * $num;
        }
        var_dump(square(4));   // 16

        function division($a, $b){
            if ($b === 0) return false;
            return $a / $b;
        }
        var_dump(division(4, 0));  // прервет выполнение и вернет false
        var_dump(division(4, 2));  // 2

```

## Возврат нескольких значений в виде массива

```php

        function user_info()
        {
            return ['Глеб', 30];
        }

        list ($name, $age) = user_info();

        var_dump($name); // Глеб
        var_dump($age); // 30

```

## Возврат значений (указание типа данных возвращаемого значения)

1.  PHP 7.0 можно указывать тип возвращаемого значения (:тип)
2.  PHP 7.1 можно указывать тип возвращаемого значения обнуляемый тип (:?тип)
3.  PHP 8 позволяет указать несколько типов аргумента, например int|float

```php

        function division(int|float $a, int|float $b) :int|float|bool
        {
           if ($b === 0) return false;
           return $a / $b;
        }
```

## Включить режим строгой типизации: `declare(strict_types=1);`

1. Без данного режима указание на тип данных будет работать как приведение типов
2. С включенным режимом указание на тип данных будет приводить к ошибке (TypeError), если передан несоответствующий тип

## Вызов функций через переменные

```php

        function create_greeting(string $name='Гость') {
            return "<h2>Добро пожаловать, $name</h2>";
        }
        $some_var = 'create_greeting';
        echo $some_var(); // аналогично echo create_greeting();
```

## Анонимные функции (замыкания /closures)

Анонимная функция в PHP - это функция без имени, которая может быть объявлена и использована внутри другой функции, присвоена переменной или передана в качестве аргумента другой функции.

1.  позволяют создавать функции без имени.
2.  Удобны для передачи в качестве значений callable-параметров.
3.  Могут быть сохранены, как значения переменных.

```php

        $minus = function (int|float $a, int|float $b) :int|float
        {
            return $a - $b;
        };
        var_dump($minus);

    ==================================================================

        $nums = [2, 6, 8];

        $sqrt = function (int|float $a) :int|float
        {
            return $a * $a;
        };

        function change_arr(array &$arr, callable $action){
            foreach ($arr as &$item) {
                $item = $action($item);
            }
        }

        change_arr($nums, $sqrt);
        var_dump($nums); // [4, 36, 64]

    ==================================================================

        $notEmpty = function($value){
            return strlen($value) > 0 ? true : 'Значение не может быть пустым';
        };
        $greaterZero = function($value){
            return $value > 0 ? true : 'Значение должно быть больше нуля';
        };
        function getBetweenValidator($min, $max){
            return function($v) use ($min, $max){
                return ($v >= $min && $v <= $max) ? true : 'Значение не попадает в промежуток';
            };
        }
        $between5_9 = getBetweenValidator(5, 9);
        var_dump($between5_9(56)); // Значение не попадает в промежуток

## Обращение к внешним переменным

        $some_var = 'переменная вне функции';
        const OUT_CONST = 'констанка вне функции';

        function some_func(){
            var_dump($some_var); // null
            var_dump(OUT_CONST); // констанка вне функции

            $some_var = 'локальная переменная функции';
        }
        var_dump($some_var); // переменная вне функции
        some_func();


        $a = 1;
        $b = 2;

        function func(){
            //global указывает, что будут использоваться глобальные переменные
            global $a, $b;
            return $a+$b;
        }

        var_dump(func()); // 3
```
