<?php


use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace("app\controller");
SimpleRouter::get("/", "PostController@index");
SimpleRouter::start();