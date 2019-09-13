<?php
require_once('./Models/User.php');

$username = $_POST['username'];
$password = $_POST['password'];
$hashPass = password_hash($password, PASSWORD_BCRYPT);

$user = new User();
if($user->findByUsername($username)) {
    header('Location: ./signup.html');
}
$user->create($username,$hashPass);
$newUser = $user->findByUsername($username);

session_start();
$_SESSION['user'] = $newUser;

header('Location: ./index.php');