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
            //TODO: budowa widoku index dla finansów -> tu już musi być jakiś szkielet -> menu po lewej, główny ekran - dashboard
            // wyświetlenie podsumowania finansó, ogólnie przeróka bootstrap admin 2
            $this->render('Finances','index');
        }
        else {
            header('Location: /myFinanceApp/Home/Index');
        }
    }

    public function Add(){
        $this->render('Finances','add');
    }

    public function Edit(){
        $this->render('Finances','show');
    }

}