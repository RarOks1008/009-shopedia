<?php

// AUTOLOAD
spl_autoload_register(function ($path) {
    $path = str_replace("\\", DIRECTORY_SEPARATOR, $path);
    $path[0] = strtolower($path[0]);
    $path .= ".php";
    require_once $path;
});
