<?php

/**
 * Global application helpers
 */

/**
 * Gets value from .env
 * @param $key
 * @return mixed
 */
function readEnv($key)
{
    return $_ENV[$key];
}

/**
 * Load view
 *
 * @param string $view
 * @param array $data
 * @return void
 */
function view($view, $data = [])
{
    // check for view file
    // link from index.php
    if (file_exists('../views/' . $view . '.php')) {
        require_once '../views/' . $view . '.php';
    } else {
        die('Whoops! View "' . $view . '" does not exist.');
    }
}