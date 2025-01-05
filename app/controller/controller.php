<?php

namespace app\controller;

use app\utilities\Template;

class Controller {

    protected Template $template;

    public function __construct(string $template)
    {
        $this->template = new Template($template);
    }
}