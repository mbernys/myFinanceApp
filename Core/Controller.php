<?php


namespace Core;

abstract class Controller
{
    var array $vars = [];

    function set(array $data): void
    {
        $this->vars = array_merge($this->vars, $data);
    }


    function render(string $controller, string $action): void
    {
        extract($this->vars);
        require("../App/Views/" . $controller . "/" . $action . ".php");
    }
}