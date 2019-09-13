<?php
require_once('./Models/User.php');

$username = $_POST['username'];
$password = $_POST['password'];

$user = new User();
$user->create($username,$password);
$newUser = $user->findByUsername($username);

session_start();
$_SESSION['user'] = $newUser;