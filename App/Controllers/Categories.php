<?php


namespace App\App\Controllers;


use Core\Controller;

class Categories extends Controller
{
    public function Index(){
        $categories = new Categories();
        $this->render('Categories','index');
    }

     public function Add(){
         $categories = new Categories();
         $this->render('Categories','add');
     }

    public function Edit(){
        $categories = new Categories();
        $this->render('Categories','edit');
    }
}