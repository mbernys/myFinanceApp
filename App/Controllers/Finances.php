<?php


namespace App\App\Controllers;


use Core\Controller;

class Finances extends Controller
{
    public function Index(){
        $finances = new Finances();
        $this->render('Finances','index');
    }

    public function Add(){
        $finances = new Finances();
        $this->render('Finances','add');
    }

    public function Edit(){
        $finances = new Finances();
        $this->render('Finances','show');
    }

}