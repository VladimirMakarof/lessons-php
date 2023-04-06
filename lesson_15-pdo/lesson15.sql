DROP DATABASE IF EXISTS library;
CREATE DATABASE IF NOT EXISTS library;

USE library;

CREATE TABLE IF NOT EXISTS tb_books(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    author VARCHAR(255) NOT NULL,
    price INT UNSIGNED DEFAULT 0, 
    img VARCHAR(255) DEFAULT 'book.png'
);

INSERT INTO tb_books (title, author, img) VALUES
('Выразительный JavaScript', 'Хавербеке Марейн', 'js.png'),
('Большая книга CSS3', 'Дэвид Макфарланд', 'css.png');

INSERT INTO tb_books (title, author, price, img) VALUES 
('Грокаем алгоритмы', 'Адитья Бхаргава', 1000, 'algoritms.png'),
('Алгоритмы. Построение и анализ', 'Томас Кормен', 5400, 'algoritms.png'); 


