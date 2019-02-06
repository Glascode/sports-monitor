<?php

/**
 * Returns the URI path string.
 */
function getUri() {
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    return $uri;
}

/**
 * Returns the request method string.
 */
function getMethod() {
    $method = $_SERVER['REQUEST_METHOD'];

    return $method;
}