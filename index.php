<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'controllers/UserController.php';

$userController = new UserController();
$userController->getUsers();
