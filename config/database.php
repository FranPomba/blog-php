<?php
namespace config;

use PDO;

class DataBase{
    private $pdo;
    
    public function connectSQLite(){
        if (!$this->pdo){
            $this->pdo = new PDO("sqlite:/",__DIR__ . "/../armazenamento.db");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }
}