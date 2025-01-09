<?php

namespace app\controller;

use app\models\User;
use app\utilities\Helpers;

class UserController extends Controller {
    private $user;
    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }

    public function signup(){
        if(isset($_POST["submit"])){
            $username = $_POST["username"] ?? null;
            $password = $_POST["password"] ?? null;
            $email = $_POST["email"] ?? null;
            if(!$this->validate($username, $password, $email)){
                echo "preencha todos os campos do formulário";
                return;
            }
            try {
                $data = ["username" => $username, "email" => $email, "password" => $password];
                $this->user->signup($data);
                Helpers::redirect("");
            } catch (\PDOException $ex) {
                echo "erro ao cadastrar o usuário" . $ex->getMessage(); 
            }
        }
    }

    public function login(){
        if(isset($_POST["submit"])){
            $email = $_POST["email"] ?? null;
            $password = $_POST["password"] ?? null;
            if($email and $password){
                $login = $this->user->login($email, $password);
                if($login){
                    Helpers::redirect("/");
                }
                echo "email ou senha incorretos";
            }
            echo "preenha todos os campos";
        }
    }

    private function validate($username, $password, $email){
        if(empty($username) || empty($password) || empty($email)){
            return false;
        }
        return true;
    }
}