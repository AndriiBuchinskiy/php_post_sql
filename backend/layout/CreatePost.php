<?php
session_start();
include "/work/backend/DataBase.php";
include "/work/backend/valid/Validator.php";
include "/work/backend/valid/Annotation.php";
include "/work/backend/valid/Content.php";
include "/work/backend/valid/Date.php";
include "/work/backend/valid/Title.php";

$db = new \Palmo\backend\DataBase("db","myuser", "mypassword","3306", "mydatabase");
$db->connect();
$title = $_POST['title'];
$annotation = $_POST['annotation'];
$content = $_POST['content'];
$date = $_POST['date'];


$titleValidator = new \Palmo\backend\valid\Title($title,$db);
$dateValidator = new \Palmo\backend\valid\Date($date);
$annotationValidator = new \Palmo\backend\valid\Annotation($annotation);
$contentValidator = new \Palmo\backend\valid\Content($content);


$_SESSION['content'] = $contentValidator->validate();

$_SESSION['annotation'] = $annotationValidator->validate();

$_SESSION['date']  = $dateValidator->validate();

$_SESSION['title'] = $titleValidator->validate();


if(!empty($_SESSION['content']) || !empty($_SESSION['annotation'])
    || !empty($_SESSION['date']) || !empty($_SESSION['title'])) {
    header('Location:' . "createPostForm.php");
} else
{
    $db->connect();
    $post = ['title' => $title, 'annotation' => $annotation,'content' => $content,'date'=>$date];
    $request = $db->query("Insert Into posts (title,annotation,content,date) VALUES (:title ,:annotation,:content,:date)", $post);
    $_SESSION['success'] = true;
    header('Location: ' . "http://localhost:85/index.php");
}


