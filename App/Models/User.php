<?php


namespace App\Models;

use Core\Model;
use App\Models\Category;

class User extends Model
{
    private string $email = '';
    private string $password = '';
    private string $errors;

    public function saveToDatabase()
    {
        if (self::checkUser()){
            if(static::actionDB("INSERT INTO `users` (email, password) VALUES ( :email, :password )", [':email' => $this->email, ':password' => $this->password])){
                return true;
            }
        }
        return false;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
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

    public function getId()
    {
        return static::fetchOneRowFromDB("SELECT * FROM `users` WHERE email = :email", [':email' => $this->email] , 'id');
    }
}
