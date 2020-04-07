<?php


namespace Core;


class Session
{
    public function createSession(){
        session_start();
    }

    public function isLogged()
    {
        if (isset($_SESSION['username'])) {
            return true;
        }
        $this->logOut();
    }

    public function logOut(){
        unset($_SESSION['username']);
    }
}