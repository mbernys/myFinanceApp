<?php

namespace Core;

use Core\Error;
use PDO;
use PDOException;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db === null){
            $dsn = 'mysql:host=localhost;dbname=myFinanceApp;charset=utf8';
            $db = new PDO($dsn, 'myFinanceApp','myFinanceApp');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }

    protected static function fetchDB($query){
        try {
            $db = static::getDB();
            $stmt = $db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            $log_error = new Error();
            $log_error->saveError($e->getMessage());
        }
    }


    protected static function countDB($query, $params = []){
        try {
            $db = static::getDB();
            $st = $db->prepare($query);
            $st->execute($params);
            return $st->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
            $log_error = new Error();
            $log_error->saveError($e->getMessage());
        }
    }

    protected static function actionDB($query, $params = []){
        try {
            $db = static::getDB();
            $st = $db->prepare($query);
            $st->execute($params);
            return true;
        } catch (PDOException $e) {
            $e->getMessage();
            $log_error = new Error();
            $log_error->saveError($e->getMessage());
        }
        return false;
    }
}