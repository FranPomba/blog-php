<?php

use app\utilities\Template;
use app\models\Post;
use app\utilities\Auth;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace("app\controller");

// rotas do post
SimpleRouter::group(['middleware' => Auth::class], function(){
    SimpleRouter::get("/post", "PostController@create");
    SimpleRouter::post("/post", "PostController@create");
    SimpleRouter::get("/post/{id}/edit", "PostController@update");
    SimpleRouter::post("/post/{id}/update", "PostController@update");
    SimpleRouter::get("/post/{id}/delete", "PostController@delete");
});
SimpleRouter::get("/posts", "PostController@index");
SimpleRouter::get("/post/{id}", "PostController@detail");

// rotas de login
SimpleRouter::get("/signup","UserController@signup");
SimpleRouter::post("/signup", "UserController@signup");
SimpleRouter::get("/login", "UserController@login");
SimpleRouter::post("/login", "UserController@login");
SimpleRouter::get("/logout","UserController@logout");



SimpleRouter::get("/", function () {
    $template = new Template('app/views');
    $posts = (new Post())->getAll();
    echo $template->render('home.php', ['posts'=> $posts]);
});
SimpleRouter::start();
