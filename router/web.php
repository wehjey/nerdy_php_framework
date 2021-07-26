<?php

use App\Controllers\PagesController;

$dispatcher = FastRoute\simpleDispatcher(static function(FastRoute\RouteCollector $route) {

    // Add application routes here...
    $route->addRoute('GET', APP_URL. '/{id}', [PagesController::class, 'index']);
});

