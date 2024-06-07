<?php
namespace Core;

use JetBrains\PhpStorm\NoReturn;

/**
 * Router -> Handles different kinds of incoming requests and requires the
 * appropriate controller to handle the request.
 */
class Router
{
    protected array $routes = [];

    /**
     * Register the incoming request to the routes array.
     *
     * @param string $method Request Method
     * @param string $uri URL string
     * @param string $controller Controller to handle the request
     * @return void
     */
    private function add(string $method, string $uri, string $controller): void
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => strtoupper($method)
        ];
    }

    /**
     * Handles GET Request.
     *
     * @param string $uri URL string
     * @param string $controller Controller to handle the request
     * @return void
     */
    public function get(string $uri, string $controller): void
    {
        $this->add('GET', $uri, $controller);
    }

    /**
     * Handles POST Request.
     *
     * @param string $uri URL string
     * @param string $controller Controller to handle the request
     * @return void
     */
    public function post(string $uri, string $controller): void
    {
        $this->add('POST', $uri, $controller);
    }

    /**
     * Handles DELETE Request.
     *
     * @param string $uri URL string
     * @param string $controller Controller to handle the request
     * @return void
     */
    public function delete(string $uri, string $controller): void
    {
        $this->add('DELETE', $uri, $controller);
    }

    /**
     * Handles PATCH Request.
     *
     * @param string $uri URL string
     * @param string $controller Controller to handle the request
     * @return void
     */
    public function patch(string $uri, string $controller): void
    {
        $this->add('PATCH', $uri, $controller);
    }

    /**
     * Call the required controller to handle the request.
     *
     * @param string $uri URL string
     * @param string $method Request Method
     * @return mixed
     */
    public function routeToController(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    /**
     * Abort the request with a given status code.
     *
     * @return void
     */
    #[NoReturn]
    private function abort(): void
    {
        http_response_code(Response::NOT_FOUND);
        view("" . (Response::NOT_FOUND) . ".php");
        die();
    }
}
