<?php

namespace App\Libs;
/**
 * Base controller class
 * Loads the models and views
 */
class Controller
{
    /**
     * Load model
     * @param $model
     * @return mixed
     */
    public function model($model)
    {
        // require model file
        require_once '../app/models/' . $model . '.php';

        // instantiate the model
        // eg return new Post()
        return new $model();
    }

    /**
     * Load view
     *
     * @param string $view
     * @param array $data
     * @return void
     */
    public function view($view, $data = [])
    {
        // check for view file
        // link from index.php
        if (file_exists('../views/' . $view . '.php')) {
            require_once '../views/' . $view . '.php';
        } else {
            die('Whoops! View "' . $view . '" does not exist.');
        }
    }
}