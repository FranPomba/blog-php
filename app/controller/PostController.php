<?php

namespace app\controller;

class PostController extends Controller
{
    public function __construct()
    {
        parent::__construct("app/views/posts");
    }

    public function index()
    {
       $this->render("index.php");
    }
}
