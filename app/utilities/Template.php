<?php

namespace app\utilities;

use \Twig\Environment;
use Twig\Lexer;
use \Twig\Loader\FilesystemLoader;

class Template
{
    private Environment $twig;
    public function __construct(string $template)
    {
        $loader = new FilesystemLoader($template);
        $this->twig = new Environment($loader, [
            'cache' => false,
            'debug' => true,
        ]);
        session_start();
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
        $lexer = new Lexer($this->twig, array($this->helpers()));
        $this->twig->addGlobal('session', $_SESSION);
        $this->twig->setLexer($lexer);
    }

    public function render($template, $data = array())
    {
        return $this->twig->render($template, $data);
    }

    private function helpers()
    {
        return array(
            $this->twig->addFunction(new \Twig\TwigFunction("url", function (string $url = null) {
                return Helpers::url($url);
            })),
            $this->twig->addFunction(new \Twig\TwigFunction("redirect", function (string $url = null) {
                return Helpers::redirect($url);
            })),
            $this->twig->addFunction(new \Twig\TwigFunction("summarizeText", function (string $text, int $limite = 100) {
                return Helpers::summarizeText($text, $limite);
            })),
            $this->twig->addFunction(new \Twig\TwigFunction("countTime", function ($data) {
                return Helpers::countTime($data);
            })),
        );
    }
}
