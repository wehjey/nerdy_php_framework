<?php

/**
 * Default controller for framework
 */

class Pages extends Controller
{

    public function __construct()
    {

    }

    public function index() 
    {
        
    }

    public function about($id) 
    {
        echo 'this is about '. $id;
    }
}