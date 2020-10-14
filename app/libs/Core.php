<?php

/**
 * App core class
 * Creates URL and loads core controller
 * URL Format - /controller/method/params
 */

class Core 
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        // Look in controllers for first value
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // if exists, set as controller
                $this->currentController = ucwords($url[0]);
                // unset 0 index
                unset($url[0]);
            }
        }

        // require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // instantiate the controller class
        // e.g pages = new Pages
        $this->currentController = new $this->currentController;
    }

    /**
     * Get current browser url
     *
     * @return array
     */
    public function getUrl() : array
    {
        $url = [];
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); // remove trailing slash
            $url = filter_var($url, FILTER_SANITIZE_URL); // remove unwanted characters
            $url = explode('/', $url); // break down url into array
        }
        return $url;
    }
}