<?php

/**
 * Returns the URI path string.
 */
function get_uri() {
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    return $uri;
}

/**
 * Returns the request method string.
 */
function get_method() {
    $method = $_SERVER['REQUEST_METHOD'];

    return $method;
}