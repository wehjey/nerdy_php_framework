<?php

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Database config file
 */
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => readEnv('DB_DRIVER'),
    'host'      => readEnv('DB_HOST'),
    'database'  => readEnv('DB_NAME'),
    'username'  => readEnv('DB_USER'),
    'password'  => readEnv('DB_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
