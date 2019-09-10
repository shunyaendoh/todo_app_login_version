<?php
require_once('./Models/Todo.php');

echo($_POST['task']);
$task = $_POST['task'];
$todo = new Todo();
$todo->create($task);
header('Location: index.php');
