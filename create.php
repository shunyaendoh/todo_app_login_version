<?php
require_once('./Models/Todo.php');

// if (isset($_POST['task']))
// {
    echo($_POST['task']);
// }

$task = $_POST['task'];

$todo = new Todo();

$todo->create($_POST['task']);
// echo('<br>');
// echo($todo->table);
// echo('<br>');
// var_dump($todo->db_manager);