<?php

namespace App\Libs;

use App\Controllers\Pages;
/**
 * App core class
 * Creates URL and loads core controller
 * URL Format - /controller/method/params
 */

class Core 
{
    protected $currentController = Pages::class;
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        // Look in controllers for first value
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // if exists, set as controller
                $this->currentController = '\App\Controllers\\' . ucwords($url[0]);
                // unset 0 index to allow reading of other values
                unset($url[0]);
            }
        }
        // instantiate the controller class
        // e.g pages = new Pages
        $this->currentController = new $this->currentController;

        // check for second part of url which is controller method
        // check if method exists in controller
        if (isset($url[1]) && method_exists($this->currentController, $url[1])) {
            $this->currentMethod = $url[1];
            // unset 1 index to allow reading of other values
            unset($url[1]);
        }

        // get url params if they exists
        $this->params = $url ? array_values($url) : [];

        // call a callback with array of params
        call_user_func_array([
            $this->currentController,
            $this->currentMethod
        ], $this->params);
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