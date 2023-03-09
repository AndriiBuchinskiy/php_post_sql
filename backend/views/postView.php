<?php
session_start();
include "/work/backend/DataBase.php";
$id = $_GET['id'];
/*
if(!isset($_SESSION['loggedIn']))
{
    header('Location: ' . "authForm.php");
}
*/
$db = new \Palmo\backend\DataBase("db","myuser", "mypassword","3306", "mydatabase");
$db->connect();
$request = $db->query("Select * From posts WHERE id = $id");


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PostView</title>
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
<?php

foreach ($request as $row)
{
    echo "<div class='col-md-4'>";
    echo "<div class='card'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>". "Title: " . $row["title"] . "</h5>";
    echo "<p class='card-text'>" . "Content: "  . substr($row["content"], 0, 50). "</p>";
    echo "<p class='card-text'>" . "Annotaion: "  . substr($row["annotation"], 0, 50) . "</p>";
    echo "<p class='card-text'>" . "Date: "  . substr($row["date"], 0, 50) . "</p>";
    echo "<a href='http://localhost:85/layout/editPostForm.php?id=" . $row["id"] . "' class='btn btn-primary'>Редагувати</a>";
    echo "<a href='http://localhost:85/layout/deletePost.php?id=" . $row["id"] . "' class='btn btn-primary'>Видалити</a>";
    echo "</div>";
    echo "</div>";
    echo "</div>";


}

?>

</body>
</html>