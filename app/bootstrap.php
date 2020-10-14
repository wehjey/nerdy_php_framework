<?php

/**
 * Framework bootstrap file
 */

// Load config file
require_once 'config/app.php';

// Autoload core libraries
spl_autoload_register(
    function ($className) {
        require_once 'libs/'. $className. '.php';
    }
);