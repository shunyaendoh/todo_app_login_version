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

    public function create($task, $userId)
    {
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . '(name, user_id) VALUES (?, ?)');
        $stmt->execute([$task, $userId]);

        return $this->db_manager->dbh->lastInsertId();
    }
    public function getAll($lastUserId)
    {
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE user_id = ?');
        $stmt->execute([$lastUserId]);
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