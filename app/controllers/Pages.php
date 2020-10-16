<?php

namespace App\Controllers;

use App\Libs\Controller;
use App\Models\Post;
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
        $post = Post::all();
        $data = [
            'title' => 'Nerdy MVC',
            'posts' => $post
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