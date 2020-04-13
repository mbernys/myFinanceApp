<?php


namespace App\Controllers;


use Core\Controller;
use Core\Session;
use App\Models\Category;

class CategoryController extends Controller
{
    public function Index(){
        $this->render('Category','index');
    }

     public function Add(){
         $session = new Session();
         $session->createSession();

         if(isset($_POST['submit'])) {

             $category = new Category($_POST['category_type'],$_POST['category_name']);

             if($category == 'true'){

                 $data['validation'] = ['color_class' => 'alert-success', 'errors' => $category->getResults()];

             } else {

                 $data['validation'] = ['color_class' => 'alert-danger', 'errors' => $category->getResults()];

             }

             $this->set($data);

         }

         $this->render('Category','add');
     }
}