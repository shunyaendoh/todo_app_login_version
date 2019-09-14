<?php
session_start();
require_once('./Models/User.php');

$username = $_POST['username'];
$password = $_POST['password'];

$user = new User();
$loginUser = $user->findByUsername($username);
if (!$loginUser) {
    header('Location: ./login.html');
}

if (password_verify($password, $loginUser['password'])) {
    session_start();
    $_SESSION['user'] = $loginUser;
    header('Location: index.php');
} else {
    $error['login'] = 'uncorrect';
    $_SESSION['login'] = $error['login'];
    header('Location: ./login.php');
}