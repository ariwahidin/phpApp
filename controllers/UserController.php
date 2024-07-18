<?php
include_once '../config/database.php';
include_once '../models/user.php';

class UserController
{
    private $db;
    private $user;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function getUsers()
    {
        $stmt = $this->user->read();
        $num = $stmt->rowCount();

        if ($num > 0) {
            $users_arr = array();
            $users_arr["records"] = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $user_item = array(
                    "id" => $id,
                    "username" => $username,
                    "email" => $email,
                    "created_at" => $created_at
                );
                array_push($users_arr["records"], $user_item);
            }
            http_response_code(200);
            echo json_encode($users_arr);
        } else {
            http_response_code(404);
            echo json_encode(
                array("message" => "No users found.")
            );
        }
    }
}
