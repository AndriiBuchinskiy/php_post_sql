<?php
session_start();
include '/work/backend/DataBase.php';
include '/work/backend/valid/Validator.php';
include '/work/backend/valid/Login.php';
include '/work/backend/valid/Password.php';
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    header('Location: ' . "http://localhost:85/index.php");
    exit();
}

$db = new \Palmo\backend\DataBase("db", "myuser", "mypassword", "3306", "mydatabase");
$db->connect();
// отримання даних з форми авторизації
$login = $_POST['login'];
$password = $_POST['password'];

$user = ['login' => $login, 'password' => $password];
$loginValidate = new \Palmo\backend\valid\Login($login,$db);
$_SESSION['login'] = $loginValidate->validate();
$passwordValidate = new \Palmo\backend\valid\Password($password);
$_SESSION['password'] = $passwordValidate->validate();
$request = $db->query("SELECT login ,password FROM users WHERE login = :login Or email = :login AND password = :password", $user);
//var_dump($request);
if (empty($request)) {
    $_SESSION['error'] = 'Невірний логін або пароль';
    header('Location: ' . "authForm.php");
} else {
    $_SESSION['loggedIn'] = true;
    header('Location:'. "http://localhost:85/layout/createPostForm.php");
    exit();
}
