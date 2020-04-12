<?php


namespace App\Controllers;

use Core\Controller;
use Core\Session;
use App\Models\Users as ModelUsers;

class Users extends Controller
{
    public function Edit(){

        $session = new Session();
        $session->createSession();


        if(isset($_POST['submit'])) {

            $users = new ModelUsers($_SESSION['username'],$_POST['password']);

            if($users->checkPassword($_SESSION['username'],$_POST['password'])){

                if($users->changePassword($_POST['new_password'],$_POST['new_password_again'])){
                    $data['validation'] = ['color_class' => 'alert-success', 'errors' => 'Password successfully changed!'];
                    $this->set($data);
                } else {
                    $data['validation'] = ['color_class' => 'alert-danger', 'errors' => $users->getErrors()];
                    $this->set($data);
                }
            } else {
                $data['validation'] = ['color_class' => 'alert-danger', 'errors' => $users->getErrors()];
                $this->set($data);
            }
        }

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