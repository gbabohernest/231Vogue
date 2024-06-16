<?php

use Core\Response;
use JetBrains\PhpStorm\NoReturn;

//For debugging delete later
function dd($value)
{
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

    return BASE_PATH . DIRECTORY_SEPARATOR . $path;

}

/**
 * Require a view within the specific script it was called.
 * @param array $attributes - values that are need for the view to work with.
 * @param $path - path to the required view.
 */
function view(string $path, array $attributes = []): void
{
    extract($attributes);

    require base_path('app/views/' . $path);
}

/**
 * Higher-order function to handle request method check and callback execution.
 *
 * @return void
 */
function handleRequest(string $method, callable $callback, array $data, $db)
{
    if ($_SERVER['REQUEST_METHOD'] === $method) {
        try {
            return $callback($data, $db);
        } catch (Exception $e) {
            echo "Error, Something went wrong!!" . $e->getMessage();
            return null;
        }
    }
    return null;
}

/**
 * Require the utility function of a given path
 * @param string $path - path to the utility functions
 * @return string - the full path to the file
 */
function appUtilities(string $path): string
{

    return base_path('app/utilities/' . $path);
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

/**
 * Logs a user in and add the key `user` or `admin` to the session and delete old session data
 * @param array $user
 * @return void
 */
function logUserIn(array $user): void
{
    $_SESSION['user'] = [
        'name' => htmlspecialchars($user['first_name']),
        'is_admin' => $user['is_admin'] ?? false,
        'user_id' => $user['user_id']
    ];

    if ($user['is_admin']) {
        $_SESSION['admin'] = [
            'admin_id' => $user['user_id'],
            'admin_name' => $user['first_name'],
        ];
    }

    session_regenerate_id(true);
}

/**
 * Logs out a user and clear the session, destroy the session
 * @return void
 */
function logUserOut(): void
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

#[NoReturn] function abort($status_code = Response::NOT_FOUND): void
{
    http_response_code($status_code);
    view("" . (Response::NOT_FOUND) . ".php");
    die();
}
