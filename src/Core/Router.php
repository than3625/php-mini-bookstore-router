<?php

declare(strict_types=1);

namespace App\Core;

use App\Support\Response;

class Router
{
    private array $routers = [];

    public function get(string $path, array $handler): void
    {
        $this->routers['GET'][$this->normalizePath($path)] = $handler;
    }

    public function post(string $path, array $handler): void
    {
        $this->routers['POST'][$this->normalizePath($path)] = $handler;
    }

    public function dispatch(string $method, string $path): void
    {
        $method = strtoupper($method);
        $path = $this->normalizePath($path);

        if(isset($this->routers[$method][$path])) {
            $this->callHandler($this->routers[$method][$path]);
            return;
        }

        $allowedMethods = $this->getAllowedMethodsForPath($path);

        if (!empty($allowedMethods)) {
            Response::methodNotAllowed($allowedMethods);
        }

        Response::notFound('404 Not Found');
    }

    private function callHandler(array $handler): void
    {
        [$controllerClass, $action] = $handler;

        if (!class_exists($controllerClass)) {
            Response::notFound('Controller not found');
        } 

        $controller = new $controllerClass();

        if (!method_exists($controller, $action)) {
            Response::notFound('Action not found');
        }

        $controller->$action();
    }

    private function getAllowedMethodsForPath(string $path): array
    {
        $allowedMethods = [];

        foreach ($this->routers as $method => $routes) {
            if (isset($routes[$path])) {
                $allowedMethods[] = $method;
            }
        }

        return $allowedMethods;
    }

    private function normalizePath(string $path): string
    {
        $path = parse_url($path, PHP_URL_PATH) ?: '/';

        if ($path !== '/') {
            $path = rtrim($path, '/');
        }

        return $path;
    }
}