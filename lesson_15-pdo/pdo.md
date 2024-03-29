## Класс PDO представляет соединение между PHP и сервером базы данных.

Для создания экземпляра PDO (соединения с сервером mysql) необходимо:

1. адрес сервера mysql
2. порт, на котором запущен mysql сервер
3. имя пользователя
4. пароль
5. название БД
6. можно передать массив с дополнительными опциями

## Создание экземпляра PDO (соединение с сервером mysql):

        $dsn = "mysql:host=АДРЕС_СЕРВЕРА_MYSQL;port=ПОРТ;dbname=ИМЯ_БД";
        $username = 'ИМЯ_ПОЛЬЗОВАТЕЛЯ';
        $pwd = 'ПАРОЛЬ_ПОЛЬЗОВАТЕЛЯ';
        
        // необязательный массив с настройками
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $connection = new PDO($dsn, $username, $pwd, $options);

Конструктор PDO выбрасывает исключение PDOException, если попытка подключения к запрашиваемой базе данных завершается с
ошибкой. 

### После того, как объект PDO создан (соединение установлено), можно создавать sql запросы и отправлять их на выполнение.

## Подготовленные и неподготовленные запросы:

Если запрос выполняется достаточно часто или в запрос передаются пользовательские данные, то правильно использовать
подготовленные запросы. Подготовленные запросы кешируются и экранируются, что позволяется создать защиту от sql
инъекций. Во всех остальных случаях можно использовать обычные (неподготовленные запросы).

## Подготовленные запросы с именованными параметрами (:имя_параметра):

    $login = 'qwerty';

Данные, которые необходимо передать в запрос заменяются на имена параметров (:имя_параметра). Имена параметров
придумывает разработчик.

    $sql = 'SELECT phone FROM tb_users WHERE login = :login';

Далее запрос нужно подготовить:

    $statement = $connection->prepare($sql); // prepare подготавливает запрос и возвращает PDOStatement или false

Теперь запрос можно выполнять, передав значения параметров:

1. передать ассоциативный массив с параметрами

        $params = [
            // ключи в массиве должны соответствовать именам параметров в запросе (:login)
            'login' => $login
        ];
        $statement->execute($params); // execute возвращает true в случае успеха или false в случае ошибки

2. установить значения через метод bindParam (переменные передаются по ссылке и вычисляются в момент выполнения запроса)
   или bindValue (значения переменных копируются)

                         // имя_параметра, значение параметра, тип данных 
        $statement->bindValue(':login', $login, PDO::PARAM_STR);
        $statement->execute();  // execute возвращает true в случае успеха или false в случае ошибки

## Подготовленные запросы с неименованными параметрами (?):

      $login = 'qwerty';
      $pwd = '123f';

Данные, которые необходимо передать в запрос заменяются на знаки вопросов (?).

    $sql = 'SELECT phone FROM tb_users WHERE login = ? AND password = ?';

Далее запрос нужно подготовить:

    $statement = $connection->prepare($sql); // prepare подготавливает запрос и возвращает PDOStatement или false

Теперь запрос можно выполнять, передав значения параметров:

1. передать нумерованный массив с параметрами

        $params = [
            // элементы в массиве должны располагаться в той очередности, что и вопросительные знаки в запросе
            $login, $pwd
        ];
        $statement->execute($params); // execute возвращает true в случае успеха или false в случае ошибки

2. установить значения через метод bindParam (переменные передаются по ссылке и вычисляются в момент выполнения запроса)
   или bindValue (значения переменных копируются)

                       // позиция знака вопроса (начиная с 1), значение параметра, тип данных 
        $statement->bindValue(1, $login, PDO::PARAM_STR);
        $statement->bindValue(2, $pwd, PDO::PARAM_STR);
        // вместо первого ? будет подставлено значение элемента с индексом 0, вместо второго с индексом 1 и тд
        $statement->execute();  // execute возвращает true в случае успеха или false в случае ошибки

## Неподготовленные запросы:

Строка запроса:

      $select_ten = 'SELECT title, price FROM items LIMIT 10';
      $select_one = 'SELECT title, price FROM items WHERE id = 1';
      $delete = 'DELETE FROM items WHERE id = 67';

Теперь запрос можно выполнять:

1. методом exec для не SELECT запросов exec запускает запрос на выполнение и возвращает:
    1. количество модифицированных строк
    2. false в случае неудачи

      $connection->exec($delete);

2. методом query для SELECT запросов query - выполняет неподготовленный sql запрос и возвращает:
    1. результирующий набор в виде объекта PDOStatement
    2. false в случае неудачи

      $statement1 = $connection->query($select_ten);
      $statement2 = $connection->query($select_one);

## Получение данных (SELECT запросы)

После того, как SELECT запрос выполнен, возникает необходимость прочитать данные. Для этого используется экземпляр
PDOStatement и его методы fetchAll (для получения данных по нескольким строкам) или fetch (для получения данных по одной
строке). Экземпляр PDOStatement возвращают методы: query и prepare.

               // параметр (одна из констант PDO::FETCH_*) указывает на то,
               // в каком виде необходимо вернуть результат: массив, объект и тп
      $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC); // в данном случае ассоциативный массив
      $result2 = $statement2->fetch(PDO::FETCH_ASSOC); // в данном случае ассоциативный массив

## Транзакции часто используются, если необходимо выполнить последовательно несколько запросов или (в случае ошибки в одном их них) не выполнять ни одного


      try {
         $connection->beginTransaction(); // начало транзакции
          // запрос 1
          // запрос 2
          // запрос 3 и тд
         $connection->commit(); // фиксация транзакции
      } catch (Exception $e) {
         // блок коды выполнится, если выполнение одного из запросов придет к ошибке
         $connection->rollBack(); // откат транзакции к началу (к вызову beginTransaction())
      }





      
      

      
         

 


