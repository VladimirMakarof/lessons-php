<?php
// Определение пространства имен для класса Router
namespace Vladimir\Lesson13Mvc\Routing;

// Импортирование класса ErrorController из другого пространства имен
use Vladimir\Lesson13Mvc\Controllers\ErrorController;

// Определение класса Router
class Router
{
    // задача роутера - на основе файла с настройками
    // создать объект нужного контроллера и вызвать нужный метод

    // Определение приватных свойств для класса
    private array $routs; // Массив маршрутов, хранящихся на сервере
    private string $uri; // URI запроса из сообщения клиента

    // Определение конструктора для класса Router
    public function __construct(array $routs)
    {
        // Присваивание предоставленного массива маршрутов свойству $routs
        $this->routs = $routs;

        // Разбиение строки запроса на массив по разделителю '?'
        $this->uri = explode('?', $_SERVER['REQUEST_URI'])[0];
    }

    // Определение метода run() для класса Router, который создает объект контроллера и вызывает метод контроллера
    public function run()
    {
        // Проверка, существует ли запрошенный маршрут в массиве маршрутов и соответствует ли метод запроса методу маршрута
        if (
            isset($this->routs[$this->uri]) &&
            $_SERVER['REQUEST_METHOD'] === $this->routs[$this->uri]['method']
        ) {
            // ['Vladimir\Lesson13Mvc\Controllers\IndexController', 'index']
            // Разбиение строки контроллера на массив по разделителю '::'
            $handler = explode('::', $this->routs[$this->uri]['controller']);
            // ['BookController', 'books']

            // Определение имени класса и имени метода
            $class = $handler[0]; // 'Vladimir\Lesson13Mvc\Controllers\IndexController'
            $method = $handler[1]; // 'index'

            // Создание объекта контроллера и вызов метода
            $controller = new $class(); // new Vladimir\Lesson13Mvc\Controllers\IndexController();
            $controller->$method(); // $controller->index();
        } else {
            // Если маршрут не найден, создание объекта ErrorController и вызов метода notFound()
            $error = new ErrorController();
            $error->notFound();
        }
    }
}
