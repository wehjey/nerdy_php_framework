<?php
use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder;

try {
    $container = $containerBuilder->build();
} catch (\Exception $e) {
    die('Whoops! An error occurred.');
}

return $container;