<?php

//For debugging delete later
function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}



/**
 * Returns a path from the project root
 * @param string $path - file path
 * @return string - full file path
 */
function base_path(string $path): string
{

    return BASE_PATH . $path;

}


/**
 * Return the path to a specific view
 * @param $path - file path.
 * @return string - full file path.
 */
function view($path): string
{

     return base_path('/app/views/' . $path);

}

/**
 * Checks if the current URL is the given URL path.
 * @param string $urlPath
 * @return bool
 */
function activeURL(string $urlPath): bool
{

    return $_SERVER['REQUEST_URI'] === $urlPath;
}

