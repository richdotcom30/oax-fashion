<?php
// Router script for PHP built-in server
// This handles Vue SPA routing by serving index.html for all routes

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve static files from root (favicon, etc.)
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// Serve build assets directly
if (strpos($uri, '/build/') === 0 && file_exists(__DIR__ . $uri)) {
    return false;
}

// Serve index.html for all other routes (SPA fallback)
echo file_get_contents(__DIR__ . '/index.html');
