<?php

namespace app\controller;

class PostController extends Controller
{
    public function __construct()
    {
        parent::__construct("app/views");
    }

    public function index()
    {
        $this->template->render("index.php");
    }
}
