<?php


namespace Core;

use PDO;
use App\Config;
use PDOException;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
            $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
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
        }
    }

    protected static function actionDB($query){
        try {
            $db = static::getDB();
            $db->prepare($query)->execute($query);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}