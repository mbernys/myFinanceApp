<?php

namespace Core;

class Router
{
    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request);

            $controller = $this->loadController();

            if (is_callable([$controller, $this->request->action])) {
                call_user_func_array([$controller, $this->request->action], [$this->request->params]);
            } else {
                header("HTTP/1.0 404 Not Found");
                include "../App/Views/404.html";
            }
    }

    public function loadController()
    {
        $name = $this->request->controller;
        $file ='../App/Controllers/' . $name . 'Controller.php';
        require($file);
        $class = "App\Controllers\\".$name."Controller";
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

