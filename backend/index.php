<?php
session_start();
include "/work/backend/DataBase.php";
if(!isset($_SESSION['loggedIn']))
{
    header('Location: ' . "http://localhost:85/views/authForm.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Сторінка постів користувача</title>
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
	<h1>Список постів користувача</h1>
	<?php
    $request = [];
    $db = new \Palmo\backend\DataBase("db","myuser", "mypassword","3306", "mydatabase");
    $db->connect();
    $request = $db->query("Select * From posts");

    foreach ($request as $row)
    {
        echo "<div class='col-md-4'>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row["title"] . "</h5>";
        echo "<p class='card-text'>" . substr($row["content"], 0, 50) . "</p>";
        echo "<a href='views/postView.php?id=" . $row["id"] . "' class='btn btn-primary'>Детальніше</a>";
        echo "<a href='layout/editPostForm.php?id=" . $row["id"] . "' class='btn btn-primary'>Редагувати</a>";
        echo "<a href='layout/deletePost.php?id=" . $row["id"] . "' class='btn btn-primary'>Видалити</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";


    }

    ?>

</body>
</html>




