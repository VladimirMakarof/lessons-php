## Сессии - механизм, который позволяет сохранять данные между несколькими запросами

`$_SESSION` - суперглобальный массив для работы с механизмом сессий

`session_start();` - запуск сессии (инициализация новой сессии и восстановление существующей)

`$_SESSION['some_data'] = 'Данные сессии';` - сохранить информацию в сессии

`isset($_SESSION['some_var'])` - проверка наличия переменной сессии

`unset($_SESSION['some_var']);` - удаление данных из сессии

`$_SESSION = [];` - удаление всех данных сессии (закрытие сессии)

`session_destroy(); `- закрытие сессии

## Директивы php.ini
`session.cookie_httponly = on` - сессионная cookie не будет доступна в js

`session.use_only_cookies = on`- идентификаторы сессии передавать только в cookie

`session.use_trans_sid = off`

`session.use_strict_mode = on`

`session.cookie_lifetime = 0`

`session.gc_maxlifetime = 1800` - удаление файлов сессий, время в секундах, после которого файл мб удален

`session.gc_probability = 1, session.gc_divisor = 1000` - вероятностная сборка мусора gc_probability/gc_divisor


