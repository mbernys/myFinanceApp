<?php


namespace Core;


class Session
{
    public function createSession(){
        session_start();
    }

    public function isLogged()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        }
        $this->logOut();
    }

    public function logOut(){
        unset($_SESSION['user_id']);
    }
}