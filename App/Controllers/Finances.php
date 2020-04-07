<?php


namespace App\Controllers;

use Core\Controller;
use Core\Session;

class Finances extends Controller
{
    public function Index(){
        $session = new Session();
        $session->createSession();
        if($session->isLogged()){
            $this->render('Finances','index');
        }
        else {
            header('Location: /myFinanceApp/Home/Index');
        }
    }

    public function Add($param = ''){
        //TODO: Create logic for isset Submit
        $this->setString($param);
        $this->render('Finances','add');
    }

    public function Edit($param = ''){
        $this->setString($param);
        $this->render('Finances','show');
    }
}