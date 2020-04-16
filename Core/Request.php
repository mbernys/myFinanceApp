<?php


namespace Core;

    class Request
    {
        public string $url;
        public string $action;
        public string $params = '';
        public string $controller;

        public function __construct()
        {
            $this->url = $_SERVER["REQUEST_URI"];
        }
    }
