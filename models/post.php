<?php
namespace model;

use config\DataBase;
use PDO;

class Post{
    private $conn;
    public function __construct() {
        $this->conn = (new DataBase())->connectSQLite();
    }
    public function insertPost($data){
        $query = "INSERT INTO posts (title, content) VALUES (?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $data["title"], PDO::PARAM_STR);
        $stmt->bindParam(2, $data["content"], PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function updatePost($data, $id){
        $query = "UPDATE posts set title=?, content=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $data["title"], PDO::PARAM_STR);
        $stmt->bindParam(2, $data["content"], PDO::PARAM_STR);
        $stmt->bindParam(3, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function deletePost($id){
        $query = "DELETE FROM posts WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}