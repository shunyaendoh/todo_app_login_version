<?php

require_once('config/dbconnect.php');

class Todo
{
    private $table = 'tasks';

    private $db_manager;

    public function __construct()
    {
        $this->db_manager = new DbManager();
        $this->db_manager->connect();
    }

    public function create($text)
    {
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . '(name) VALUES (?)');
        $stmt->execute([$text]);
        header('Location: index.php');
    }
}