<?php
$path = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/');
if (str_contains($path, "\\") || str_contains($path, "\0") || preg_match('~(?:^|/)(?:\.|\.\.)(?:/|$)~', $path) ||
    preg_match('~^/(?:\.\w|config(?:\.local)?\.php|system(?:/|$)|tools(?:/|$)(?![^?]+\.(?:js|css|png|gif|svg|woff2?)(?:$))|payments(?:/|$)|install/(?:ip\.txt|includes|steps))~i', $path) ||
    ($path !== '/' && preg_match('~^/install(?:/|$)~i', $path) && is_file(__DIR__ . '/installer.lock'))) {
    http_response_code(404);
    exit;
}
return false;


