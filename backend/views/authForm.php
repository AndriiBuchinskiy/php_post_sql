<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Авторизація</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
<h1>Авторизація</h1>

<form action="auth.php" method="post">
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" aria-describedby="emailHelp" placeholder="Enter login">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <?php

    if (isset($_SESSION['error']))
    {
        echo "<h2 style='color: red'>" . $_SESSION['error']. "</h2><br>";
        unset($_SESSION['error']);
    }
    ?>

    <button type="submit" class="btn btn-primary">Login</button>
</form>
</body>
</html>
