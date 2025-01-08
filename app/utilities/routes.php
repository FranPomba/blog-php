<?php

use app\utilities\Template;
use app\models\Post;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace("app\controller");

SimpleRouter::get("/posts", "PostController@index");
SimpleRouter::get("/post","PostController@create");
SimpleRouter::post("/post", "PostController@create");
SimpleRouter::get("/post/{id}","PostController@detail");


SimpleRouter::get("/", function () {
    $template = new Template('app/views');
    $posts = (new Post())->getAll();
    echo $template->render('home.php', ['posts'=> $posts]);
});
SimpleRouter::start();
