<?php
// однострочный комментарий 
/* многострочный 
комментарй
*/
# однострочный комментарий в стиле unix 
// $ - объявление переменной 
$login = 'qwerty'; // первая инструкция, //! обязательно все инструкции разделять ;
$email = 'qwe@mail.ru';
$age = 19;
var_dump($login, $email); //! используется для отладки 
// инструкии в php разделять обязательно ;
// echo начало формирование тела сообщения, для вывода данных 
echo "Логин: $login, email: $email, возраст: $age"; // двойные кавычки как обратные в js \\ echo всегда преобразовывает к строке 
// если отправлял запрос отправлял не js то браузер отрисует это как html страницу, а если js то echo получить js 
?>

если вне тегов php есть текст то его проигнорирует php но он попадёт в тело сообщения
<?php
echo " Логин: $login";
?>
<!-- для вывода переменных которые были объявлены -->
<h2> Логин: <?php echo $login ?></h2>
<p> email: <?php echo $email ?></p>
<p> Возраст: <?php echo $age ?></p>