<?php



namespace Framework;

use App\Controllers\ErrorController;


class Router
{

    /**
     * Add a new route
     * 
     * @param string $method
     * @param string $uri
     * @param string $action
     * @return void
     */

    private $routes = [];

    public function registerRoute($method, $uri, $action)
    {
        list($controller, $controllermethod) = explode('@', $action);
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllermethod
        ];
    }

    /**
     * Add a GET route
     * @param string $uri
     * @param $controller
     * return void
     */
    public function get($uri, $controller)
    {
        $this->registerRoute('GET', $uri, $controller);
    }

    /**
     * Add a POST route
     * @param string $uri
     * @param $controller
     * return void
     */
    public function post($uri, $controller)
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    /**
     * Add a PUT route
     * @param string $uri
     * @param $controller
     * return void
     */
    public function put($uri, $controller)
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    /**
     * Add a DELETE route
     * @param string $uri
     * @param $controller
     * return void
     */
    public function delete($uri, $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }



    /**
     * Route the request
     * @param string $uri
     * @param string $method
     * return void
     */
    public function route($uri)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['method'] !== $requestMethod) {
                continue;
            }

            $uriSegments = explode('/', trim($uri, '/'));
            $routeSegments = explode('/', trim($route['uri'], '/'));

            if (count($uriSegments) !== count($routeSegments)) {
                continue;
            }

            $match = true;

            if (count($uriSegments) === count($routeSegments) && strtoupper($route['method']) === $requestMethod) {
                $params = [];
                
                $match = true;

                for ($i = 0; $i < count($routeSegments); $i++) {
                    //if the uri do not match and there is no value between the {id}
                    if ($routeSegments[$i] !== $uriSegments[$i] && ! preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                        $match = false; 
                        break;
                    }

                    if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }
                if ($match) {
                    //Extract controller and controller method
                    $controller = "App\\Controllers\\{$route['controller']}";
                    $controllerMethod = $route['controllerMethod'];

                //instantiate controller class
                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod($params);
                return;
                }
            }
        }

        ErrorController::notFound();
    }
}
