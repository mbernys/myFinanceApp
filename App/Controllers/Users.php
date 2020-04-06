<?php


namespace App\Controllers;

use Core\Controller;
use Core\Session;
use App\Models\Users as ModelUsers;

class Users extends Controller
{
    public function Index(){
        $this->render('Users','index');
    }
    public function Edit(){
        $this->render('Users','edit');
    }
    public function Login(){

          if(isset($_POST['submit'])) {

            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

                $users = new ModelUsers($_POST['email'],$_POST['password']);

                if($users->checkPassword($_POST['email'],$_POST['password'])){
                    $session = new Session();
                    $session->createSession();
                    $_SESSION['username'] = $_POST['email'];
                    header('Location: /myFinanceApp/Finances/Index');
                } else {

                    $data['validation'] = ['color_class' => 'alert-danger', 'errors' => 'Please type correct password!'];
                    $this->set($data);
                    $this->render('Home','login');

                }

            } else {

                $data['validation'] = ['color_class' => 'alert-danger', 'errors' => 'Please type correct email address!'];
                $this->set($data);
                $this->render('Home','login');

            }

        } else {

            $this->render('Home','login');

        }

    }

    public function Add(){

        if(isset($_POST['submit'])){

            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

                if($_POST['password'] == $_POST['password_again']){

                    $usersToDB = new ModelUsers($_POST['email'],$_POST['password']);

                    if($usersToDB == 'true'){

                        $data['validation'] = ['color_class' => 'alert-success', 'errors' => 'User successfully Registered! Go to <a href="/myFinanceApp/Home/Login">Login Page!</a>'];

                    } else {

                        $data['validation'] = ['color_class' => 'alert-warning', 'errors' => 'This email already exist!'];

                    }

                } else {

                    $data['validation'] = ['color_class' => 'alert-danger', 'errors' => 'Please type the same password twice!'];

                }

            } else {

                $data['validation'] = ['color_class' => 'alert-danger', 'errors' => 'Please type correct email address!'];

            }

            $this->set($data);

        }

        $this->render('Users','add');

    }

    public function ValidateUsersAdd(){

    }
}