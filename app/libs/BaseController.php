<?php

namespace App\Libs;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @param $view
     * @param array $data
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function view($view, $data = [])
    {
        return $this->response()->setContent(
            $this->render($view, $data)
        );
    }

    /**
     * Response object
     * @return Response
     */
    public function response()
    {
        return new Response;
    }

    /**
     * Request object
     * @return Request
     */
    public function request()
    {
        return Request::createFromGlobals();
    }
}