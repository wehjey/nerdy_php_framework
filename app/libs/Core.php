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
        $this->getUrl();
    }

    /**
     * Get current browser url
     *
     * @return void
     */
    public function getUrl() {
        echo $_GET['url'];
    }
}