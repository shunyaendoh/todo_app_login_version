<?php
require_once('./Models/Todo.php');
require_once('index.php');


if (isset($_GET['id']))
{
    $todo->delete($_GET['id']);
    header('Location: index.php');
    exit;
}