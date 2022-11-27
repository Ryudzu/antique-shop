<?php
    session_start();
    require_once './db_connection/connection.php';

    $username = $_POST['username'];
    $password = md5(md5(trim($_POST['password'])));

    $check_user = mysqli_query($conn, "SELECT * FROM `User` WHERE `username` = '$username' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {
        header('Location: ../pages/main.php');
    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: login.php');
    }
?>