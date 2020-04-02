<?php


namespace App\Models;

use Core\Model;

class Users extends Model
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hash;
        static::actionDB("INSERT INTO users (email, password) VALUES ( $email, $hash )");
    }

    public function setPassword($id,$password, $password_again)
    {
        if($password === $password_again){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $this->password = $hash;
            static::actionDB("UPDATE users SET password= $hash WHERE id = $id");
            return true;
        }
        return false;
    }

    public function checkPassword($password)
    {
        $hash = DB::getPassword($this->email);
        $checked = password_verify($password, $hash);
        if ($checked) {
            return true;
        }
        return false;
    }
}
