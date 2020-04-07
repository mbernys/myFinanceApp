<?php


namespace App\Controllers;

use Core\Controller;
use Core\Session;

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
    public function Logout(){
        $session = new Session();
        $session->createSession();
        $session->logOut();
        $this->render('Home','index');
    }
}