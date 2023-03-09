<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
