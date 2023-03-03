<?php
// однострочный комментарий
/*
многострочный
комментарий
*/
# однострочный комментарий в стиле unix

$login = 'qwerty';
$email = 'qwe@mail.ru';
$age = 19;

var_dump($login, $email);

echo "Логин: $login, email: $email, возраст: $age";
?>

Текст вне тегов php

<?php
echo "Логин: $login";

?>

<h2>Логин: <?php echo $login?></h2>
<p>email: <?php echo $email?></p>
<p>Возраст: <?php echo $age?></p>
