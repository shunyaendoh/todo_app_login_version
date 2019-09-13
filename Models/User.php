<?php
require_once('./config/dbconnect.php');

class User
{
    private $db_manager;

    public function __construct()
    {
        $this->db_manager = new DbManager();
        $this->db_manager->connect();
    }
    public function create($username, $password)
    {
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO users (username, password, created_at) VALUES (?, ?, now())');
        $stmt->execute([$username,$password]);
    }
    public function findByUsername($username)
    {
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $result = $stmt->fetch();
        return $result;
    }
}
