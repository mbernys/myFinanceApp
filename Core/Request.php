<?php


namespace Core;

    class Request
    {
        public $url;
        public $action;
        public $params;

        public function __construct()
        {
            $this->url = $_SERVER["REQUEST_URI"];
        }
    }
