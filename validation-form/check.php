<?php
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = md5($password."qweqwe12easdf");

    $mysql = new mysqli('localhost', 'root', '', 'users');
    $mysql->query("INSERT INTO `users` (`name`, `username`, `email`, `password`) VALUES('$name','$username','$email','$password')");
    $mysql->close();

    header('Location: /');