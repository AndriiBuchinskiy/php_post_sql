<?php
include "/work/backend/DataBase.php";
$db = new \Palmo\backend\DataBase("db","myuser", "mypassword","3306", "mydatabase");
$db->connect();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Видалення поста з бази даних</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
              crossorigin="anonymous">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://localhost:85/index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:85/layout/createPostForm.php">Create Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:85/views/authForm.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="http://localhost:85/views/regForm.php">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:85/layout/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </head>
    <body>
    <div class="container">
        <h1>Видалення поста</h1>
<?php
$id = $_GET['id'];
if(!empty($id)){
    $post_id = $id;

    $sql = "DELETE FROM posts WHERE id='$post_id'";
    if(empty($db->query($sql)) ){
        echo "<div class='alert alert-success'>Пост було успішно видалено!</div>";
    } else{
        echo "<div class='alert alert-danger'>Помилка видалення поста!</div>";
    }

} else echo "<div class='alert alert-danger'>Невідома помилка!</div>";

