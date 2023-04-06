-- однострочный комментарий
# однострочный комментарий
/*
многострочный
комментарий
*/

-- создание нового пользователя
-- CREATE USER 'имя_пользователя'@'адрес_сервера' IDENTIFIED BY 'пароль'   
CREATE USER 'web'@'localhost' IDENTIFIED BY 'web';   
-- права доступа пользователя
-- GRANT ALL ON имяБД.имяТаблицы
GRANT ALL ON *.* TO 'web'@'localhost';