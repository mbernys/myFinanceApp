<?php


namespace App\Controllers;


use Core\Controller;
use Core\Session;
use App\Models\Categories as ModelCategories;

class Categories extends Controller
{
    public function Index(){
        $this->render('Categories','index');
    }

     public function Add(){
         $session = new Session();
         $session->createSession();

         if(isset($_POST['submit'])) {

             $category = new ModelCategories($_POST['category_type'],$_POST['category_name']);

             if($category == 'true'){

                 $data['validation'] = ['color_class' => 'alert-success', 'errors' => $category->getResults()];

             } else {

                 $data['validation'] = ['color_class' => 'alert-danger', 'errors' => $category->getResults()];

             }

             $this->set($data);

         }

         $this->render('Categories','add');
     }
}