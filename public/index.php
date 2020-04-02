<?php

use Core\Dispatcher;
use Core\Request;
use Core\Router;

require '../vendor/autoload.php';

$dispatch = new Dispatcher();
$dispatch->dispatch();

