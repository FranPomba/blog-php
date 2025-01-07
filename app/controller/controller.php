<?php

namespace app\controller;

use app\utilities\Template;

class Controller
{

    private Template $template;

    public function __construct()
    {
        $this->template = new Template("app/views/");
    }

    public function render(string $view, array $data = [])
    {
        echo $this->template->render($view, $data);
    }
}
