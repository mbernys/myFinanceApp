<?php


namespace App\Controllers;

use Core\Controller;
use Core\Session;
use App\Models\User;

class UserController extends Controller
{
    public function Edit(){

        $session = new Session();
        $session->createSession();


        if(isset($_POST['submit'])) {

            $user = new User($_SESSION['user_id'],$_POST['password']);

            if($user->checkPassword($_SESSION['user_id'],$_POST['password'])){

                if($user->changePassword($_POST['new_password'],$_POST['new_password_again'])){
                    $data['validation'] = ['color_class' => 'alert-success', 'errors' => 'Password successfully changed!'];
                    $this->set($data);
                } else {
                    $data['validation'] = ['color_class' => 'alert-danger', 'errors' => $user->getErrors()];
                    $this->set($data);
                }
            } else {
                $data['validation'] = ['color_class' => 'alert-danger', 'errors' => $user->getErrors()];
                $this->set($data);
            }
        }

        $this->render('User','edit');
    }
    public function Login(){

          if(isset($_POST['submit'])) {

            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

                $user = new User($_POST['email'],$_POST['password']);

                if($user->checkPassword($_POST['email'],$_POST['password'])){
                    $session = new Session();
                    $session->createSession();
                    $_SESSION['username'] = $_POST['email'];
                    $_SESSION['user_id'] = $user->getId($_POST['email']);
                    header('Location: /myFinanceApp/Finance/Index');
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

                    $userToDB = new User($_POST['email'],$_POST['password']);

                    if($userToDB == 'true'){

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

        $this->render('User','add');

    }

    public function ValidateUsersAdd(){

    }
}