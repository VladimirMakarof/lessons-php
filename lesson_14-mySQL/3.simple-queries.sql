-- выбор БД для работы
USE library;

-- SHOW DATABASES; -- все БД
-- SHOW TABLES; -- все таблицы

-- создание таблицы
CREATE TABLE IF NOT EXISTS tb_books(
--  название столбца тип данных доп информация
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    author VARCHAR(255) NOT NULL,
    price INT UNSIGNED DEFAULT 0, 
    img VARCHAR(255) DEFAULT 'book.png'
);

-- добавление данных в таблицу
INSERT INTO tb_books (title, author, img) VALUES
('Выразительный JavaScript', 'Хавербеке Марейн', 'js.png'),
('Большая книга CSS3', 'Дэвид Макфарланд', 'css.png');

INSERT INTO tb_books (title, author, price, img) VALUES 
('Грокаем алгоритмы', 'Адитья Бхаргава', 1000, 'algoritms.png'), -- одна строка
('Алгоритмы. Построение и анализ', 'Томас Кормен', 5400, 'algoritms.png'); -- следующая строка

-- получение данных из таблицы
-- SELECT названия столбцов FROM таблица WHERE фильтрация по строкам;

-- получение всех записей по всем столбцам
SELECT * FROM tb_books;

-- получение всех записей по определенным столбцам
SELECT title, img FROM tb_books;

-- получение данных с фильтрацией по строкам
-- использование операторов = != < > <= >=
SELECT title FROM tb_books WHERE price < 1000;
SELECT price FROM tb_books WHERE title = 'Большая книга CSS3';

-- использование AND (и) OR (или) NOT (не)
-- SELECT столбцы FROM course WHERE условие1 AND условие2;
SELECT * FROM tb_books WHERE price > 500 AND price < 2000;

-- использование BETWEEN AND
SELECT title, price FROM tb_books 
WHERE price BETWEEN 0 AND 1000; -- включая  начальное и конечное значение

-- IN(value1, value2, value3)
SELECT title FROM tb_books 
WHERE price IN(500, 1000, 3000);

-- LIKE %символы%  / символы% / %символы  
SELECT * FROM tb_books WHERE title LIKE '%алго%'; 

-- сортировка
-- ORDER BY DESC - по убыванию
-- ORDER BY ASC - по возрастанию
SELECT * FROM tb_books ORDER BY title DESC;
SELECT * FROM tb_books ORDER BY price; -- ASC

-- сотрировка по нескольким столбцам
SELECT * FROM tb_books 
ORDER BY price ASC, title DESC;
-- если значения по столбцу price будут одинаковые, 
-- будет происходить сортировка по столбцу title

-- обновление данных (строк) в таблице
UPDATE tb_books SET price=2000 WHERE id=2;
UPDATE tb_books SET img='css3.png' WHERE title='Большая книга CSS3';

-- удаление строк из таблицы
DELETE FROM tb_books WHERE id=2;

/* 
Индексы (index) применяются для быстрого поиска строк.
Индексы используются для того, чтобы:
Быстро найти строки, соответствующие выражению WHERE.
Извлечь строки из других таблиц при выполнении объединений.

Уникальные индексы (unique index) указывают на то, 
что значение по данному столбцу (или сочетанию столбцов) не могут повторяться

Первичные ключи накладывают ограничения:
может быть только один в таблице
может быть составным (по нескольким столбцам)
значение по данному столбцу не могут повторяться
значение по данному столбцу не могут быть null
*/ 

-- работа с индексами
-- CREATE INDEX название_индекса ON название_таблицы(столбец);
CREATE INDEX price_ind ON tb_books(price);
CREATE UNIQUE INDEX title_ind ON tb_books(title);

-- составные индексы
CREATE INDEX title_author ON tb_books(title, author);

-- удаление индекса с названием duration_date
DROP INDEX img_author ON tb_books;

-- посмотреть все индексы
SHOW INDEX FROM tb_books;

-- описание запроса с использованием индекса 
EXPLAIN SELECT * FROM tb_books WHERE price > 500;

