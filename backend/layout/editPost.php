<?php
session_start();
include "/work/backend/DataBase.php";
include "/work/backend/valid/Validator.php";
include "/work/backend/valid/Annotation.php";
include "/work/backend/valid/Content.php";
include "/work/backend/valid/Date.php";
include "/work/backend/valid/Title.php";

$postId = $_POST['post_id'];
$postTitle = $_POST['title'];
$postAnnotation = $_POST['annotation'];
$postContent = $_POST['content'];
$postDate = date('Y-m-d', strtotime($_POST['date']));

$db = new \Palmo\backend\DataBase("db","myuser","mypassword","3306","mydatabase");
$db->connect();

$titleValidator = new \Palmo\backend\valid\Title($postTitle,$db);
$dateValidator = new \Palmo\backend\valid\Date($postDate);
$annotationValidator = new \Palmo\backend\valid\Annotation($postAnnotation);
$contentValidator = new \Palmo\backend\valid\Content($postContent);


$contentResult = $contentValidator->validate();

$annotationResult = $annotationValidator->validate();

$dateResult = $dateValidator->validate();

$titleResult = $titleValidator->validate();



if (!$titleResult) {
    $_SESSION['errors']['title'] = "Title must be long 3 symvols ";
}
if (!$annotationResult) {
    $_SESSION['errors']['annotation'] = "Annotation don't have more 500 symbols";
}
if (!$contentResult) {
    $_SESSION['errors']['content'] = "Content don't have more 30000 symbols";
}

if (!$dateResult) {
    $_SESSION['errors']['date'] = "Date is not valid or dimm current date";
}

if (!empty($_SESSION['errors'][''])) {
    header('Location:' . "editPostForm.php");
} else {

    $post = [':title' => $postTitle, ':annotation' => $postAnnotation, ':content' => $postContent, ':date' => $postDate, ':id' => $postId];
    $db->query("UPDATE posts SET title = :title, annotation = :annotation, content = :content, date = :date WHERE id = :id",$post);
    $_SESSION['success'] = true;

}
header('Location: ' . "http://localhost:85/index.php");

