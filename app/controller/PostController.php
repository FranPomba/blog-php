<?php

namespace app\controller;

use app\utilities\Helpers;
use app\models\Post;
use PDOException;

class PostController extends Controller
{
    private $post;
    public function __construct()
    {
        $this->post = new Post();
        parent::__construct();
    }

    public function index()
    {
        $posts = $this->post->getAll();
        $this->render("posts/index.php", ["posts" => $posts]);
    }
    public function create()
    {
        if (isset($_POST["submit"])) {
            $title = $_POST["title"] ?? null;
            $body = $_POST["body"] ?? null;
            $user = $_SESSION['user']['id'];
            if (!$this->validateData($title, $body)) {
                $error = "preencha todos os campos";
            } else {
                $data = ["title" => $title, "body" => $body, "user_id" => $user];
                try {
                    $id = $this->post->insertPost($data);
                    Helpers::redirect("post/$id");
                } catch (PDOException $ex) {
                    $error = "Error ao inserir o post " . $ex->getMessage();
                }
            }
        }
        $this->render("posts/create.php", ["error" => $error ?? null]);
    }

    public function detail($id)
    {
        $post = $this->post->findById($id);
        if (!$post) {
            $error = "post não encontrado";
        }
        $this->render("posts/detail.php", ["post" => $post, "error" => $error ?? null]);
    }

    public function update($id)
    {
        if (isset($_POST["submit"])) {
            $title = $_POST["title"] ?? null;
            $body = $_POST['body'] ?? null;
            if (!$this->validateData($title, $body)) {
                return;
            }
            $data = ["title" => $title, "body" => $body];
            $this->post->updatePost($data, $id);
            Helpers::redirect("post/$id");
        } else {
            $data = $this->post->findById($id);
            if (!$data) {
                $error = "post não encontrado";
            }
            $this->render("posts/update.php", ["post" => $data, "error" => $error ?? null]);
        }
    }

    public function delete($id)
    {
        $this->post->deletePost($id);
        Helpers::redirect("");
    }

    private function validateData($title, $body)
    {
        if (empty($title) || empty($body)) {
            return false;
        }
        return true;
    }
}
