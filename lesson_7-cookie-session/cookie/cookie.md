## Cookie - небольшие наборы данных, с помощью которых можно хранить информацию на стороне клиента
Cookie передаются в заголовках и доступны на сервере при следующем запросе клиента в суперглобальном массиве $_COOKIE

`setcookie(name, value, expire, path, domain, secure, httponly)` - установить cookie

## Удаление cookie
    setcookie('key', null); 
    setcookie('key', 'name', время в прошлом);
    setcookie('key', null, -1);

### Обязательные параметры:
1) name - имя cookie
2) value - значение cookie

### Необязательные параметры:
3) expire - время жизни cookie (сколько name и value будут храниться на клиенте)
4) path - путь к каталогу на сервере, для которого будут доступны cookie
5) domain - домен, для которого доступны cookie
6) secure (true / false) - cookie могут/не могут передаваться только по https
7) httponly (true / false) - cookie будет/не будет доступны js
8) начиная с php 7.3 samesite: 'None', 'Lax', 'Strict'



