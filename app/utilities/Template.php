<?php

namespace app\utilities;

use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;

class Template
{
    private Environment $twig;
    public function __construct()
    {
        $loader = new FilesystemLoader("app/views");
        $this->twig = new Environment($loader);
    }

    public function render($template, $data = array())
    {
        $this->twig->render($template, $data);
    }
}
