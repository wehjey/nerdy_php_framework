<?php

namespace App\Controllers;

use App\Libs\BaseController;
use App\Models\Post;
/**
 * Default controller for framework
 */

class PagesController extends BaseController
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
        view('pages/index', $data);
    }

    public function about() 
    {
        $data = [
            'title' => 'About Us'
        ];

        view('pages/about', $data);
    }
}