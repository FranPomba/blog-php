<?php

use app\utilities\Template;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace("app\controller");

SimpleRouter::get("/posts", "PostController@index");
SimpleRouter::get("/post","PostController@create");


SimpleRouter::get("/", function () {
    $template = new Template('app/views');
    echo $template->render('home.php');
});
SimpleRouter::start();
