<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');

/**
 * Require needed files
 */
require_once '../bootstrap.php';

/**
 * Initialize Core app library
 */
$init = new App\Libs\Core;
