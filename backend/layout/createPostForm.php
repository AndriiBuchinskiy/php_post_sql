<?php
session_start();
if(!isset($_SESSION['loggedIn']))
{
    header('Location: ' . "/views/authForm.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Створення поста</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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

<br>
<div class="container">
    <div class="row">

        <form style="width: 100%" method="post" action="CreatePost.php" >
            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label">Заголовок</label>
                <div class="col-md-10">
                    <input
                        type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        value=""
                    >
                    <div class="invalid-feedback"></div>
                    <?php
                    if (isset($_SESSION['title']))
                    {
                        echo "<h2 style='color: red'>" . $_SESSION['title']['message'] . "</h2><br>";
                        unset($_SESSION['title']);
                    }
                    ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="annotation" class="col-md-2 col-form-label">Аннотація</label>
                <div class="col-md-10">
                    <input
                        name="annotation"
                        id="annotation"
                        class="form-control"
                        cols="30"
                        rows="10"
                    >
                    </input>
                    <div class="invalid-feedback"></div>
                    <?php

                    if (isset($_SESSION['annotation']))
                    {
                        echo "<h2 style='color: red'>" . $_SESSION['annotation']['message'] . "</h2><br>";
                        unset($_SESSION['annotation']);
                    }

                    ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="content" class="col-md-2 col-form-label">Текст поста</label>
                <div class="col-md-10">
                    <input
                        name="content"
                        id="content"
                        class="form-control"

                    >

                    <div class="invalid-feedback"></div>
                    <?php

                    if (isset($_SESSION['content']))
                    {
                        echo "<h2 style='color: red'>" . $_SESSION['content']['message']. "</h2><br>";
                        unset($_SESSION['content']);
                    }

                    ?>

                </div>
            </div>


                </div>
            </div>



            <div class="form-group row">
                <label for="date" class="col-md-2 col-form-label">Дата публікації</label>
                <div class="col-md-10">
                    <input
                        type="date"
                        class="form-control"
                        id="date"
                        name="date"
                        value=""
                    >
                    <div class="invalid-feedback"></div>
                    <?php

                    if (isset($_SESSION['date']))
                    {
                        echo "<h2 style='color: red'>" . $_SESSION['date']['message'] . "</h2><br>";
                        unset($_SESSION['date']);
                    }

                    ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-9">
                    <button type="submit" class="btn btn-primary">Створити пост</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
