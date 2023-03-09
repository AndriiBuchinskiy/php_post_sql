<?php
session_start();
include '/work/backend/DataBase.php';
include '/work/backend/valid/Validator.php';
include '/work/backend/valid/Login.php';
include '/work/backend/valid/Email.php';
include '/work/backend/valid/City.php';
include '/work/backend/valid/CheckPassword.php';
include '/work/backend/valid/Password.php';
include '/work/backend/valid/PhoneNumber.php';
include '/work/backend/valid/Sex.php';


$login = $_POST['login'];
$password = $_POST['password'];
$check_pass = $_POST['check_pass'];
$email = $_POST['email'];
$city = $_POST['city'];
$phNumber = $_POST['phNumber'];
$sex = $_POST['sex'];

$db = new \Palmo\backend\DataBase("db","myuser", "mypassword","3306", "mydatabase");
$db->connect();
$loginValidator = new \Palmo\backend\valid\Login($login, $db);
$_SESSION['login'] = $loginValidator->validate();


$emailValidator = new \Palmo\backend\valid\Email($email, $db);
$_SESSION['email'] = $emailValidator->validate();

$cityValidator = new \Palmo\backend\valid\City($city);
$_SESSION['city'] = $cityValidator->validate();


$passwordValidator = new \Palmo\backend\valid\Password($password);
$_SESSION['password'] = $passwordValidator->validate();

$checkPassValidator = new \Palmo\backend\valid\CheckPassword($check_pass, $password);
$_SESSION['check_pass'] = $checkPassValidator->validate();

$phNumberValidator = new \Palmo\backend\valid\PhoneNumber($phNumber);
$_SESSION['phNumber'] = $phNumberValidator->validate();

$sexValidator = new \Palmo\backend\valid\Sex($sex);
$_SESSION['sex'] = $sexValidator->validate();

if(empty($_SESSION['login']) || empty($_SESSION['password'])
    || empty($_SESSION['check_pass']) || empty($_SESSION['city'])
    || empty($_SESSION['phNumber']) || empty($_SESSION['email']) || empty($_SESSION['sex'])) {
    header('Location:' . "regForm.php");
} else {
    $user = ['login' => $login, 'password' => $password, 'email' => $email, 'city' => $city, 'phNumber' => $phNumber, 'sex' => $sex];
    $request = $db->query("Insert Into users (login,password,email,city,phNumber,sex) VALUES (:login ,:password,:email,:city,:phNumber,:sex)", $user);
    $db->disconnect();
    $_SESSION['loggedIn'] = true;
    $_SESSION['username'] = $login;
    header('Location: ' . "http://localhost:85/layout/createPostForm.php");
}