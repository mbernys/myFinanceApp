<?php


namespace Core;

class Validation
{
    public function ValidateUsersAdd(){

            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                if($_POST['password'] == $_POST['password_again']){
                    return true;
                } else {
                    return 'Please type the same password twice!</br>';
                }
            } else {
                return 'Please type correct email address!</br>';
            }
    }

}