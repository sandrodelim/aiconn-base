<?php 
namespace Aiconn\Core;

/**
 * Class Router
 * 
 * @author Sandro Mattos
 * @package Aiconn\Core
 */
class Router
{
    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path       = $this->request->getPath();
        $method     = $this->request->getMethod();

        $callback   = $this->routes[$method][$path] ?? false;

        if($callback === false){
            echo "404 - Not Found";
            exit;
        }

        if(is_string($callback)){
            return $this->renderView($callback);
        }
        

        $html = call_user_func($callback);
        echo $html;
    }


    public function renderView($view)
    {
        include_once __DIR__ . "/../Views/$view.php";
    }
}