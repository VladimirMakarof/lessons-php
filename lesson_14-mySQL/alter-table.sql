-- редактирование структуры таблицы (ALTER)
-- изменение названия таблицы
ALTER TABLE имя_таблицы RENAME TO новое_имя;

-- добавление столбца
ALTER TABLE имя_таблицы 
ADD COLUMN 
имя_столбца тип_данных характеристики;

-- удаление столбца
ALTER TABLE имя_таблицы 
DROP COLUMN имя_столбца;

-- изменение имени столбца / типа данных
ALTER TABLE имя_таблицы  -- изменить имя
CHANGE COLUMN старое_имя новое_имя
новый_тип_данных новые_характеристики;

ALTER TABLE имя_таблицы
MODIFY имя_столбца
новый_тип_данных новые_характеристики;

ALTER TABLE имя_таблицы
ADD CONSTRAINT имя_связи
FOREIGN KEY (название столбца)
REFERENCES связанная_таблица(первичный_ключ);




SELECT * FROM new_table;



ALTER TABLE tb_books RENAME TO tb_new;

