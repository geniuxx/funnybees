<?php
/**
 * Route
 * 2018/04/07
 * Claudio Genio
 * 
 */
class Route
{
    public $baseurl;  
    public $method;
    public $params;
}

class Router
{
    public $routes;   

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function resolve($app_path)
    {
        $matched = false;
        
        foreach($this->routes as $route) {
            if(strpos($app_path, $route->baseurl) === 0) {
                $matched = true;
                break;
            }
        }

        if(! $matched) throw new Exception('Could not match route.');

        $param_str = str_replace($route->baseurl, '', $app_path);
        $params = explode('/', trim($param_str, '/'));
        $params = array_filter($params);

        $match = clone($route);
        $match->params = $params;
 
        $this->dispatch($match, $route->method);
    }

    private function dispatch($match, $method)
    { 
        if($match) {
            // chiama il metodo 'action'  della classe 'controller'
            if (method_exists($match->params[0], "action")) {
                call_user_func_array(   
                                        array(new $match->params[0], "action"),
                                        array($method, $match->params)
                                    );
            }
            else
            {
                // Invalid Request Method
                header("HTTP/1.0 404 page not found");
            }
        }
    }
}
