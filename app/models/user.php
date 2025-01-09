<?php

namespace app\models;

use app\config\DataBase;
use PDO;

class User{
    private $conn; 
    public function __construct()
    {
        $this->conn = (new DataBase())->connectSQLite();
    }

    public function signup($data){
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $password = password_hash($data["password"], PASSWORD_DEFAULT);
        $stmt->bindParam(1, $data["username"], PDO::PARAM_STR);
        $stmt->bindParam(2, $data["email"], PDO::PARAM_STMT);
        $stmt->bindParam(3, $password, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function login($email, $password){
        $query = "SELECT * FROM users WHERE email=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $hashPass = password_verify($password, PASSWORD_DEFAULT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user && $user['password'] == $hashPass){
            unset($user['password']);
            return $user;
        }
        return false;
    }
}