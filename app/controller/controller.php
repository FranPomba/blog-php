<?php

namespace app\controller;

use app\utilities\Template;

class Controller
{

    private Template $template;

    public function __construct(string $template)
    {
        $this->template = new Template($template);
    }

    public function render(string $view, array $data = [])
    {
        echo $this->template->render($view, $data);
    }
}
