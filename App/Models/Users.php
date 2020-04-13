<?php


namespace App\Models;

use Core\Model;
use App\Models\Categories as Categories;

class Users extends Model
{
    private $email;
    private $password;
    private $isCreate;
    private $errors;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hash;
        if (self::checkUser()){
            if(static::actionDB("INSERT INTO `users` (email, password) VALUES ( :email, :hash )", [':email' => $this->email, ':hash' => $this->password])){
                $this->isCreate = 'true';
            }
        } else {
            $this->isCreate = 'false';
        }
        return $this->isCreate;
    }

    public function __toString(){
        return $this->isCreate;
    }

    public function checkPassword($email,$password)
    {
        $hash = static::fetchOneRowFromDB("SELECT * FROM `users` WHERE email = :email", [':email' => $email] , 'password');
        $checked = password_verify($password, $hash);
        if ($checked) {
            return true;
        } else {
            $this->errors = 'Please type correct current password!';
        }
        return false;
    }

    public function changePassword($new_password, $new_password_again){
        if($new_password === $new_password_again){
            $hash = password_hash($new_password, PASSWORD_DEFAULT);
            if(static::actionDB("UPDATE `users` SET password = :hash WHERE email = :email", [':email' => $this->email, ':hash' => $hash])){
                return true;
            } else {
            $this->errors = 'Something went wrong! Please try again.';
        }
        } else {
            $this->errors = 'Please type new password correctly twice!';
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    public function checkUser()
    {
        if(static::countDB("SELECT * FROM `users` WHERE email = :email", [':email' => $this->email]) > 0){
            return false;
        }
        return true;
    }
}
