<?php
class User
{
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $email;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT id, username, email, created_at FROM " . $this->table_name. " LIMIT 1000";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
