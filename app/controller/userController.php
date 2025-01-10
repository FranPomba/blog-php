<?php

namespace app\controller;

use app\models\User;
use app\utilities\Helpers;

class UserController extends Controller
{
    private $user;
    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }

    public function signup()
    {
        if (isset($_POST["submit"])) {
            $username = $_POST["username"] ?? null;
            $password = $_POST["password"] ?? null;
            $email = $_POST["email"] ?? null;
            if (!$this->validate($username, $password, $email)) {
                $error = "preencha todos os campos do formulário";
            } else {
                try {
                    $data = ["username" => $username, "email" => $email, "password" => $password];
                    $this->user->signup($data);
                    Helpers::redirect("login");
                } catch (\PDOException $ex) {
                    $error = "erro ao cadastrar o usuário" . $ex->getMessage();
                }
            }
            
        }
        $this->render('users/signup.php', ["error" => $error]);
    }

    public function login()
    {
        session_start();

        if (isset($_POST["submit"])) {
            $email = filter_var($_POST["email"] ?? '', FILTER_SANITIZE_EMAIL);
            $password = trim($_POST["password"] ?? '');

            if ($email && $password) {
                $login = $this->user->login($email, $password);
                if ($login) {
                    $_SESSION['user'] = [
                        'id' => $login['id'],
                        'username' => $login['username'],
                        'email' => $login['email']
                    ];
                    Helpers::redirect("");
                    exit;
                }
                $error = "Email ou senha incorretos.";
            } else {
                $error = "Por favor, preencha todos os campos.";
            }
        }
        $this->render("users/login.php", ['error' => $error ?? null]);
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        Helpers::redirect("login");
        exit();
    }

    private function validate($username, $password, $email)
    {
        if (empty($username) || empty($password) || empty($email)) {
            return false;
        }
        return true;
    }
}
