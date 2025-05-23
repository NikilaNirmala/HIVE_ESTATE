<?php
// require_once Helper::absPath('helper.php');
require_once Helper::absPath('routes/Route.php');
class Router
{

    private $routes = [];

    function addRoute($uri, $path, $requestMethod, $actionMethod, $className)
    {
        $this->routes[] = new Route($requestMethod, $uri, $path, $actionMethod, $className);
    }

    function executeController($serverUri, $serverMethod)
    {
        $controller = null;
        foreach ($this->routes as $route) {
            if ($route->uri === $serverUri && $route->requestMethod === $serverMethod) {
                $controller = $route;
                break;
            }
        }
        if (!$controller) {
            include Helper::absPath('views/404.view.php');
            exit;
        }

        // var_dump($controller);
        include "{$controller->path}";
        $controllerName = $controller->className;
        $newController = new $controllerName();
        // var_dump($newController);
        $method = $controller->actionMethod;
        //print_r($method);
        $newController->$method();
    }
}
