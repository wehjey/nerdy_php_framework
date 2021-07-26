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