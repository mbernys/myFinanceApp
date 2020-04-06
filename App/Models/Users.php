<?php


namespace App\Models;

use Core\Model;

class Users extends Model
{
    private $email;
    private $password;
    private $isCreate;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hash;
        if (self::checkUser($this->email)){
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
        }
        return false;
    }

    public function checkUser($email)
    {
        if(static::countDB("SELECT * FROM `users` WHERE email = :email", [':email' => $email]) > 0){
            return false;
        }
        return true;
    }
}
