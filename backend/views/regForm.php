<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration user</title>
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

        <form style="width: 100%" method="post" action="registration.php" >
            <div class="form-group row">
                <label for="login" class="col-md-2 col-form-label">Логін</label>
                <div class="col-md-10">
                    <input
                        type="text"
                        class="form-control"
                        id="login"
                        name="login"
                        value=""
                    >
                    <div class="invalid-feedback"></div>
                    <?php
                    if (isset($_SESSION['login']))
                    {
                        echo "<h2 style='color: red'>" . $_SESSION['login']['message'] ."</h2><br>";
                        unset($_SESSION['login']);
                    }
                    ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label">Пароль</label>
                <div class="col-md-10">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                    >
                    <div class="invalid-feedback"></div>
                    <?php

                    if (isset($_SESSION['password']))
                    {
                        echo "<h2 style='color: red'>" . $_SESSION['password']['message'] . "</h2><br>";
                        unset($_SESSION['password']);
                    }

                    ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="check_pass" class="col-md-2 col-form-label">Підтвердити пароль</label>
                <div class="col-md-10">
                    <input
                        type="password"
                        name="check_pass"
                        id="check_pass"
                        class="form-control"
                    >

                    <div class="invalid-feedback"></div>
                    <?php

                    if (isset($_SESSION['check_pass']))
                    {
                        echo "<h2 style='color: red'>" . $_SESSION['check_pass']['message'] . "</h2><br>";
                        unset($_SESSION['check_pass']);
                    }

                    ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-2 col-form-label">Місто</label>
                <div class="col-md-10">
                    <input
                        name="city"
                        id="city"
                        class="form-control"
                    >

                    <div class="invalid-feedback"></div>
                    <?php

                    if (isset($_SESSION['city']))
                    {
                        echo "<h2 style='color: red'>" . $_SESSION['city']['message'] . "</h2><br>";
                        unset($_SESSION['city']);
                    }

                    ?>

                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label">Email</label>
                <div class="col-md-10">
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value=""
                    >
                    <div class="invalid-feedback"></div>
                    <?php

                    if (isset($_SESSION['email']))
                    {
                        echo "<h2 style='color: red'>" . $_SESSION['email']['message']. "</h2><br>";
                        unset($_SESSION['email']);
                    }

                    ?>


                </div>
            </div>

            <div class="form-group row">
                <label for="phNumber" class="col-md-2 col-form-label">Номер телефону</label>
                <div class="col-md-10">
                    <input
                        type="text"
                        class="form-control"
                        id="phNumber"
                        name="phNumber"
                        value=""
                    >
                    <div class="invalid-feedback"></div>
                    <?php
                    if (isset($_SESSION['phNumber']))
                    {
                        echo "<h2 style='color: red'>" . $_SESSION['phNumber']['message']. "</h2><br>";
                        unset($_SESSION['phNumber']);
                    }
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Стать</label>
                <div class="col-md-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="sex" value="male" >
                        <label class="form-check-label" for="sex_yes">
                            Чоловіча
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="sex" value="female" >
                        <label class="form-check-label" for="sex_no">
                            Жіноча
                        </label>
                    </div>
                    <div class="invalid-feedback"></div>
                    <?php
                    if (isset($_SESSION['sex']))
                    {
                        echo "<h2 style='color: red'>" . $_SESSION['sex']['message'] . "</h2><br>";
                        unset($_SESSION['sex']);
                    }
                    ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-9">
                    <button type="submit" class="btn btn-primary">Зареєструватись</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>

