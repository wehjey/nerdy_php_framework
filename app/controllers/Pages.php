<?php

namespace App\Controllers;

use App\Libs\Controller;
use App\Models\Post;
/**
 * Default controller for framework
 */

class Pages extends Controller
{

    private $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function index() 
    {
        $data = [
            'title' => 'Nerdy MVC',
            'posts' => $this->post->getPosts()
        ];
        $this->view('pages/index', $data);
    }

    public function about() 
    {
        $data = [
            'title' => 'About Us'
        ];

        $this->view('pages/about', $data);
    }
}