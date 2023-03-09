<?php
session_start();
session_destroy();
header('Location: ' . "http://localhost:85/views/authForm.php");
