<?php

namespace App\Controllers;

use App\Libs\BaseController;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Post;
/**
 * Default controller for framework
 */

class PagesController extends BaseController
{
    public function __construct()
    {
    }

    public function index($id, Request $request)
    {
        //echo $request->get('foo');
        $post = Post::all();
        $data = [
            'title' => 'Nerdy MVC',
            'posts' => $post,
            'app_name' => APP_NAME,
            'app_url' => APP_URL
        ];

        return $this->render('pages/index', $data);
    }

    public function about() 
    {
        $data = [
            'title' => 'About Us',
            'app_name' => APP_NAME,
            'app_url' => APP_URL
        ];

        return $this->render('pages/about', $data);
    }
}