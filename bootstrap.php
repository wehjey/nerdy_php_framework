<?php

/**
 * Framework bootstrap file
 */

// Register dotenv
use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

// Load config file
require_once 'config/app.php';
require_once 'config/database.php';