<?php
session_start();
require_once('./Models/User.php');
if (isset($_SESSION['signup'])) {
$username = $_SESSION['signup']['username'];
$password = $_SESSION['signup']['password'];
$hashPass = password_hash($password, PASSWORD_BCRYPT);
}
$user = new User();
if($user->findByUsername($username)) {
    header('Location: ./signup.php');
    exit();
}
$user->create($username,$hashPass);
$newUser = $user->findByUsername($username);

session_start();
$_SESSION['user'] = $newUser;

header('Location: ./index.php');