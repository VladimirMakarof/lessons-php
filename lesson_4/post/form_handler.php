<?php

// form_handler.php
$server = $_SERVER;
if ($server['REQUEST_METHOD'] === 'POST') {
  $post = $_POST;
  // для формы
  // ['значение атрибута name' => 'значение атрибута value']
  var_dump($post);
  var_dump($post['email']);
  var_dump($post['phone']);
}
