<?php

namespace app\controller;

use app\utilities\Helpers;
use app\models\Post;
use PDOException;

class PostController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $posts = (new Post())->getAll();
        $this->render("posts/index.php", ["posts" => $posts]);
    }
    public function create()
    {
        if (isset($_POST["submit"])) {
            $title = $_POST["title"] ?? null;
            $body = $_POST["body"] ?? null;
            if (!$this->validateData($title, $body)) {
                return;
            }
            $data = ["title" => $title, "body" => $body];
            try {
                $post = new Post();
                $id = $post->insertPost($data);
                Helpers::redirect("post/$id");
            } catch (PDOException $ex) {
                echo "Error ao inserir o post " . $ex->getMessage();
                Helpers::url("/post");
            }
        } else {
            $this->render("posts/create.php");
        }
    }

    public function detail($id)
    {
        $post = (new Post())->findById($id);
        if (!$post) {
            echo "post não encontrado";
            return;
        }
        $this->render("posts/detail.php", ["post" => $post]);
    }

    public function update($id)
    {
        $post = new Post();
        if (isset($_POST["submit"])) {
            $title = $_POST["title"] ?? null;
            $body = $_POST['body'] ?? null;
            if (!$this->validateData($title, $body)) {
                return;
            }
            $data = ["title" => $title, "body" => $body];
            $post->updatePost($data, $id);
            Helpers::redirect("post/$id");
        } else {
            $data = $post->findById($id);
            if (!$data) {
                echo "post não encontrado";
            }
            $this->render("posts/update.php", ["post" => $data]);
        }
    }

    public function delete($id)
    {
        $post = new Post();
        $post->deletePost($id);
        Helpers::redirect("/");
    }

    private function validateData($title, $body)
    {
        if (empty($title) || empty($body)) {
            echo "preencha todos os campos";
            return false;
        }
        return true;
    }
}
