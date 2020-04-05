<?php


namespace App\Controllers;

use Core\Validation;
use Core\Controller;
use App\Models\Users as ModelUsers;


class Users extends Controller
{
    public function Index(){
        $users = new Users();
        $this->render('Users','index');
    }
    public function Edit(){
        $users = new Users();
        $this->render('Users','edit');
    }
    public function Login(){
        $users = new Users();
        //TODO: Logowanie do systemu
        // sprawdzanie w bazie usera where user i password to zahashowana wartość - > count, jeśli nie to zwracanie błędów jak w register
        $this->render('Finances','index');
    }

    public function Add(){
        $users = new Users();

        if(isset($_POST['submit'])){
            $validation = new Validation();
            if($validation->ValidateUsersAdd() === true){
                $usersToDB = new ModelUsers($_POST['email'],$_POST['password']);
                    if($usersToDB == 'true'){
                        $data['validation'] = ['color_class' => 'alert-success', 'errors' => 'User successfully Registered! Go to <a href="/myFinanceApp/Home/Login">Login Page!</a>'];
                    } else {
                        $data['validation'] = ['color_class' => 'alert-warning', 'errors' => 'This email already exist!'];
                    }
                } else {
                $data['validation'] = ['color_class' => 'alert-danger', 'errors' => $validation->ValidateUsersAdd()];
            }
            $this->set($data);
        }
        $this->render('Users','add');
    }

}