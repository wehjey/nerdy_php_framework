<?php

/**
 * Framework bootstrap file
 */

// Load config file
require_once 'config/app.php';
require_once 'config/database.php';

// Autoload core libraries
spl_autoload_register(
    static function ($className) {
        // require_once 'Libs/'. $className. '.php';
        $parts = explode('\\', $className);
        require_once 'app/Libs/' . end($parts) . '.php';
    }
);