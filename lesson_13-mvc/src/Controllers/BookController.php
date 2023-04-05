<?php

namespace Vladimir\Lesson13Mvc\Controllers;

class BookController extends Controller
{
    // метод будет вызван на запрос /books GET
    public function books()
    {
        echo $this->getPage('books/books.php', ['title' => 'Книги']);
    }

    // метод будет вызван на запрос /book?id=43 GET
    public function bookById()
    {
        echo $this->getPage('books/book.php', ['title' => 'Книга']);
    }
}
