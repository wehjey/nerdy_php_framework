<?php

/**
 * Global application helpers
 */

/**
 * Gets value from .env
 * @param $key
 * @return mixed
 */
function env($key)
{
    return $_ENV[$key];
}