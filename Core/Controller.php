<?php


namespace Core;

abstract class Controller
{
    var $vars = [];

    function set($data)
    {
        $this->vars = array_merge($this->vars, $data);
    }

    function render($controller, $action)
    {
        extract($this->vars);
        require("../App/Views/" . $controller . '/' . $action . '.php');
    }

    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secure_form($form)
    {
        foreach ($form as $key => $value)
        {
            $form[$key] = $this->secure_input($value);
        }
    }

}