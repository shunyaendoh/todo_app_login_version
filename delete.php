<?php
require_once('./Models/Todo.php');

echo('aaa');
$id = $_GET['id'];
$todo = new Todo();
$todo->delete($id);
// header('Location: index.php');


