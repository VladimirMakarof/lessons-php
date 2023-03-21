<?php
session_start();

$server = $_SERVER;

if ($server['REQUEST_METHOD'] === 'POST') {
    $post = $_POST;
    if (trim($post['login']) === 'qwerty' && trim($post['password']) === '123'){
        $_SESSION['login'] = $post['login'];
        $answer = ['message' => 'success'];
    } else {
        $answer = ['message' => 'error'];
    }
    echo json_encode($answer);
}
