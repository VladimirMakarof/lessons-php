<?php
// Определение пространства имен для класса Controller
namespace Vladimir\Lesson13Mvc\Controllers;

// Определение абстрактного класса Controller
abstract class Controller
{
    // Защищенный метод getPage(), который генерирует HTML-страницу, используя шаблон и данные
    protected function getPage(string $content, array $data, string $template = 'template.php')
    {
        // Разбиение массива данных на переменные
        extract($data);

        // Начало буферизации вывода
        ob_start();

        // Подключение указанного шаблона
        include_once __DIR__ . '/../../templates/' . $template;

        // Получение содержимого буфера вывода
        $page = ob_get_contents();

        // Очистка буфера вывода и завершение буферизации
        ob_end_clean();

        // Возврат сгенерированной страницы
        return $page;
    }

    // Защищенный метод getJson(), который возвращает данные в формате JSON
    protected function getJson(array $data)
    {
        // Кодирование данных в формат JSON и возврат результата
        return json_encode($data);
    }
}
