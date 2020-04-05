<?php


namespace App\Controllers;

use Core\Controller;

class Home extends Controller
{
    public function Index(){
        $home = new Home();
        $this->render('Home','index');
    }
    public function Login(){
        $home = new Home();
        $this->render('Home','login');
    }
}