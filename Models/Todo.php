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

    public function create($task)
    {
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . '(name) VALUES (?)');
        $stmt->execute([$task]);

        return $this->db_manager->dbh->lastInsertId();
    }
    public function getAll()
    {
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results;
    }
    public function delete($num)
    {
        $stmt = $this->db_manager->dbh->prepare('DELETE FROM ' . $this->table . ' WHERE id = ?');
        $stmt->execute([$num]);
    }
    public function get($num)
    {
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
        $stmt->execute([$num]);
        $result = $stmt->fetch();

        return $result;
    }
    public function update($task, $id)
    {

        $stmt = $this->db_manager->dbh->prepare('UPDATE ' . $this->table . ' SET name = ? WHERE id = ?');
        $stmt->execute([$task, $id]);
    }
}