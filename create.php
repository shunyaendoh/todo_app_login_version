<?php
header("Content-type: application/json; charset=utf-8");
require_once('./Models/Todo.php');

$task = $_POST['task'];
$todo = new Todo();
$lastId = $todo->create($task);
$newTask = $todo->get($lastId);
$subDate = substr($newTask['due_date'],0,10);

$tr = <<<EOF
<tr data-tr={$newTask['id']}>
<td>{$newTask['name']}</td>
<td>{$subDate}</td>
<td>
    <a class="text-success" href="edit.php?id={$newTask['id']}">EDIT</a>
</td>
<td>
    <a class="delete-btn text-danger" href="delete.php?id={$newTask['id']}" data-id="{$newTask['id']}">DELETE</a>
</td>
</tr>
EOF;

echo json_encode($tr);