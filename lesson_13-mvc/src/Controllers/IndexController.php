<?php

// объявление пространства имен, где определен контроллер
namespace Vladimir\Lesson13Mvc\Controllers;


// class IndexController extends Controller - объявление класса контроллера IndexController, который наследуется от абстрактного класса Controller
class IndexController extends Controller
{
    // метод будет вызван на запрос / GET
    // public function index() - объявление публичного метода index(), который будет вызван при запросе по умолчанию (GET-запрос на /).
    public function index()
    {
        // echo $this->getPage('main.php', ['title' => 'Главная']); - вызов метода родительского класса Controller::getPage(), который формирует HTML-страницу на основе шаблона "main.php" и переданных ему данных (заголовок страницы "Главная").
        echo $this->getPage('main.php', ['title' => 'Главная']);
    }
}

// Общий смысл контроллера заключается в обработке запросов и передаче данных модели для получения необходимых данных. Затем контроллер использует представление для генерации HTML-кода, который отображается в браузере пользователя.