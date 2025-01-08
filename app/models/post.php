<?php
namespace app\models;

use app\config\DataBase;
use PDO;

class Post{
    private $conn;
    public function __construct() {
        $this->conn = (new DataBase())->connectSQLite();
    }
    public function insertPost($data){
        $query = "INSERT INTO posts (title, body) VALUES (?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $data["title"], PDO::PARAM_STR);
        $stmt->bindParam(2, $data["body"], PDO::PARAM_STR);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    public function updatePost($data, $id){
        $query = "UPDATE posts set title=?, body=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $data["title"], PDO::PARAM_STR);
        $stmt->bindParam(2, $data["body"], PDO::PARAM_STR);
        $stmt->bindParam(3, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function deletePost($id){
        $query = "DELETE FROM posts WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function findById($id){
        $query = "SELECT * FROM posts WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll(){
        $query = "SELECT * FROM posts";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findPost($data){
        $query = "SELECT * FROM posts WHERE 1=1";
        $values = [];
        if(isset( $data["title"])){
            $query .= " AND title LIKE ?";
            $values[] = "%" . $data["title"] . "%";
        }
        if(isset($data['body'])){
            $query .= " AND body LIKE ?";
            $values = "%" . $data['body'] . "%";
        }
        if(isset($data["created_at"])){
            $query .= "AND created_at = ?";
            $values = $data['created_at'];
        }
        $stmt = $this->conn->prepare($query);
        $stmt->execute($values);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}