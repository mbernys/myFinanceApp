<?php

namespace Core;

class Router
{
    public function dispatch()
    {
        $request = new Request();
        Router::parse($request);

            $checkClass = $this->loadController($request->controller);

            if (is_callable([$checkClass, $request->action])) {
                call_user_func_array([$checkClass, $request->action], [$request->params]);
            } else {
                header("HTTP/1.0 404 Not Found");
                include "../App/Views/404.html";
            }
    }

    public function loadController($controller)
    {
        $file ='../App/Controllers/' . $controller . 'Controller.php';
        require($file);
        $class = "App\Controllers\\". $controller ."Controller";
        return new $class();
    }

    static public function parse($request)
    {
        $url = trim($request->url);
        $explode_url = explode('/', $url);
        $explode_url = array_slice($explode_url, 2);

        foreach($explode_url as $element)
        {
            if(empty($element))
            {
                unset($element);
            }
        }

        if(!array_filter($explode_url)) {
            $explode_url[0] = 'Home';
            $explode_url[1] = 'Index';
            $explode_url[2] = '';
        }
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            if(count($explode_url) > 2){
                $request->params = $explode_url[2];
            }
    }
}

