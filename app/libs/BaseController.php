<?php

namespace App\Libs;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
/**
 * Base controller class
 * Loads the models and views
 */
class BaseController
{
    /**
     * Loads view with twig template engine
     * @param $view
     * @param array $data
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function render($view, $data = [])
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../views');
        $twig = new Environment($loader);
        echo $twig->render($view . '.html.twig', $data);
    }
}