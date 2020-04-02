<?php

namespace Core;

class Router
{

    static public function parse($request)
    {
            $url = trim($request->url);
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            var_dump($explode_url);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = $explode_url[2];
    }
}

