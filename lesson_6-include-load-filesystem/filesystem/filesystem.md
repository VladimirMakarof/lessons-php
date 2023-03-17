## Функции для работы с файловой системой

1. `basename( string path ) :string` - возвращает имя файла, выделенного из пути к файлу.
2. `dirname( string path ) :string` - возвращает имя родительского каталога из указанного пути.
3. `realpath( string path ) :string` - возвращает канонизированный абсолютный путь к файлу.
4. `getcwd () :string` - возвращает имя текущего рабочего каталога.
5. `chdir( string directory ) :string` - изменяет текущий каталог на указанный в аргументе directory.


6. `file_exists ( string filename ) :bool` - проверка существования файла.
7. `is_readable ( string filename ) :bool` - проверка существования файла, доступного для чтения.
8. `is_writable ( string filename ) :bool` - проверка существования файла, доступного для записи.


9. `is_file ( string filename ) :bool` - определяет, является ли файл обычным файлом.
10. `is_dir ( string filename ) :bool` - определяет, является ли имя файла директорией.
11. `is_executable ( string filename ) :bool` - определяет, является ли файл исполняемым.
12. `is_link ( string filename ) :bool` - определяет, является ли файл символической ссылкой.
13. `touch ( string filename [, int time [, int atime ]] ) :bool` - устанавливает время доступа и модицикации файла.
14. `copy ( string source, string dest ) :bool` - копирует файл source в файл с именем dest.
15. `rename ( string oldname, string newname ) :bool` - переименовывает файл oldname в newname.
16. `unlink ( string filename ) :bool` - удаляет файл filename.
17. `mkdir ( string path [, int mode [, bool recursive ]] ) :bool` - создаeт новую директорию path с атрибутами доступа mode.
18. `rmdir ( string dirname ) :bool` - функция пытается удалить директорию dirname.
   

## Запись данных:

`file_put_contents(имя_файла, данные_для_записи, [флаги])` - записывает данные в файл
### Принимаемые аргументы:
1. имя_файла - запись осуществляется в указанный файл, если файла не существует, он будет создан
2. флаги:
   1) FILE_APPEND - запись в конец файла 
   2) LOCK_EX - блокировка файла на время записи
    
### Возвращаемые значения:
1. количество записанных байт
2. false в случае ошибки записи

## Чтение данных в строку:
`file_get_contents(имя_файла)` - читает содержимое файла в строку

## Чтение данных в массив:
`file(имя_файла, [флаги])` - читает содержимое файла в массив, где каждая строка - элемент массива

### Флаги:
1. FILE_SKIP_EMPTY_LINES - игнорировать пустые строки
2. FILE_IGNORE_NEW_LINES - игнорировать перенос строки





