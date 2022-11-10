<?php

    session_start();
    require_once 'connection.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        $password = md5($password);

        $query = "INSERT INTO `User` (`username`, `email`, `password`, `phone`, `address`) VALUES ('$username', '$email', '$password', '$phone', '$address')";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: login.php');
    } else {
        $_SESSION['message'] = 'Пароли не совпадают!';
        header('Location: register.php');
    }
?>