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
        call_user_func_array([$controller, $this->request->action], [$this->request->params]);
    }

    public function loadController()
    {
        $name = $this->request->controller;
        $file ='../App/Controllers/' . $name . '.php';
        require($file);
        $class = "App\Controllers\\".$name;
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

