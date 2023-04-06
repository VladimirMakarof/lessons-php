/* Связи между таблицами:
1. один к одному (человек - паспорт)
2. одни ко многим - одной записи в одной таблице может соответствовать несколько записей в другой таблице (статья - отзыв)
3. многие ко многим - нескольким записям в одной таблице может соответствовать несколько записей в другой таблице (книга - автор)
4. связь внутри таблицы (ответ на комментарий) */

CREATE TABLE IF NOT EXISTS tb_users(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL,
    hash VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_reviews(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    added DATETIME default CURRENT_TIMESTAMP, -- текущее время
    text TEXT NOT NULL,
    id_user INT NOT NULL, -- id пользователя, добавившего комментарий
    id_book INT NOT NULL, -- id книги, на которую оставили отзыв
    CONSTRAINT review_user -- связь tb_reviews с таблицей tb_users
    FOREIGN KEY (id_user) -- по столобцу id_user из текущей таблицы
    REFERENCES tb_users(id) -- и столбцу id из tb_users
    ON DELETE RESTRICT, -- нельзя удалить пользователя, если он оставил отзыв
	CONSTRAINT review_book -- связь tb_reviews с таблицей tb_books
    FOREIGN KEY (id_book) -- по столобцу id_book из текущей таблицы
    REFERENCES tb_books(id) -- и столбцу id из tb_books
    ON DELETE CASCADE -- если удаляется книга, удаляются и отзывы
);

INSERT INTO tb_users (login, hash) VALUES 
('qwerty', 'gwyhyynuyium'),
('user', 'juw68juw468ik'),
('admin', 'ju46w8u8iiwi7');

INSERT INTO tb_reviews (text, id_user, id_book) VALUES
('отличная книга', 1, 3),
('очень сложная книга!!!', 1, 4),
('нет информации по современному коду', 3, 2),
('советую', 1, 2);

-- название книги : текст комментария
SELECT tb_books.title AS book_title, tb_reviews.text AS reviews_text
FROM tb_books, tb_reviews
WHERE tb_books.id = tb_reviews.id_book;

-- JOIN запросы
/*
1. INNER JOIN (CROSS JOIN) - внутреннее (перекрёстное) объединение
2. LEFT JOIN - левостороннее внешнее объединение
3. RIGHT JOIN - правостороннее внешнее объединение */



-- INNER JOIN (внутреннее (перекрёстное) объединение)
/*
Этот тип объединения позволяет извлекать строки, которые обязательно присутствуют во всех объединяемых таблицах.
Чаще всего требуется выбрать только те записи, которые сопоставлены друг другу.
Сделать это можно, если задать условие отбора, используя ON или USING
*/

SELECT b.title, r.text, r.added 
FROM tb_books b
INNER JOIN tb_reviews r
ON b.id = r.id_book;


-- LEFT JOIN (левостороннее внешнее объединение)
/*
Левосторонние объединения позволяют извлекать данные из таблицы, дополняя их по возможности данными из другой таблицы.
Выбирает все записи из таблицы FROM и дополняет их записями из таблицы LEFT JOIN,
если соответствий не найдено проставляется null
*/
SELECT u.login, r.text, r.added 
FROM tb_users u
LEFT JOIN tb_reviews r
ON u.id = r.id_user;

-- Если дополнить предыдущий запрос условием на проверку несуществования отзывов,
-- то можно получить список записей, которые не имеют пары в другой таблице

-- пользователи, которые не писали отзывы
SELECT u.login 
FROM tb_users u
LEFT JOIN tb_reviews r
ON u.id = r.id_user
WHERE r.text IS NULL;

-- отзыв, логин пользователя для книги с определенным названием
SELECT r.text, r.added, u.login 
FROM tb_reviews r
INNER JOIN tb_users u
ON r.id_user = u.id
INNER JOIN tb_books b
ON r.id_book = b.id
WHERE b.title = 'Большая книга CSS3';

-- RIGHT JOIN - Правостороннее внешнее объединение - противоположность LEFT JOIN
-- Данные берутся из второй таблицы (RIGHT JOIN)
-- и сравниваются с данными, которые находятся в таблице, указанной после FROM






