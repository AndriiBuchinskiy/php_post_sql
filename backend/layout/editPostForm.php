<?php
session_start();
$id = $_GET['id'];
include "/work/backend/DataBase.php";
$db = new \Palmo\backend\DataBase("db","myuser", "mypassword","3306", "mydatabase");
$db->connect();
$request = $db->query("Select * From posts WHERE id = $id");
foreach ($request as $row)
{
     $_POST['title'] = $row["title"];
     $_POST['annotation'] =$row["annotation"];
     $_POST['content'] = $row["content"];
     $_POST['date'] = $row["date"];
}
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Редагування поста</title>
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

    <br>
    <div class="container">
        <div class="row">

            <form style="width: 100%" method="post" action="editPost.php">
                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label">Заголовок</label>
                    <div class="col-md-10">
                        <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                value="<?php echo $_POST['title']; ?>"
                        >
                        <div class="invalid-feedback"></div>
                        <?php
                        if (isset($_SESSION['errors']['title'])) {
                            echo "<h2 style='color: red'>" . $_SESSION['errors']['title'] . "</h2><br>";
                            unset($_SESSION['errors']['title']);
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
                                value="<?php echo $_POST['annotation']; ?>"
                        >
                        </input>
                        <div class="invalid-feedback"></div>
                        <?php

                        if (isset($_SESSION['errors']['annotation'])) {
                            echo "<h2 style='color: red'>" . $_SESSION['errors']['annotation'] . "</h2><br>";
                            unset($_SESSION['errors']['annotation']);
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
                                value="<?php echo $_POST['content']; ?>"
                        >
                        </input>
                        <div class="invalid-feedback"></div>
                        <?php

                        if (isset($_SESSION['errors']['content'])) {
                            echo "<h2 style='color: red'>" . $_SESSION['errors']['content'] . "</h2><br>";
                            unset($_SESSION['errors']['content']);
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
                    value="<?php echo date('Y-m-d', strtotime($_POST['date'])); ?>"
            >
            <div class="invalid-feedback"></div>
            <?php

            if (isset($_SESSION['errors']['date'])) {
                echo "<h2 style='color: red'>" . $_SESSION['errors']['date'] . "</h2><br>";
                unset($_SESSION['errors']['date']);
            }

            ?>

        </div>
        <input type="hidden" name="post_id" value="<?php echo $_GET['id']; ?>">
    </div>
    <div class="form-group row">
        <div class="col-md-9">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>

    </div>
    </form>
        </div>
    </div>
    </body>
    </html>
