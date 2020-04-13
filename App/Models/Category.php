<?php


namespace App\Models;

use Core\Model;

class Category extends Model
{
    private $type;
    private $name;
    private $results;
    private $isCreate;

    public function __construct($type, $name)
    {
        $this->type = $type;
        $this->name = $name;
        if (self::checkCategory()) {
            if (static::actionDB("INSERT INTO `categories` (type, name) VALUES ( :type, :name )", [':type' => $this->type, ':name' => $this->name])) {
                $this->results = 'Category successfully added!.';
                $this->isCreate = 'true';
            } else {
                $this->results = 'Something went wrong! Please try again.';
                $this->isCreate = 'false';
            }
        } else {
                $this->results = 'This category already exist!';
            $this->isCreate = 'false';
            }
    }

    private function checkCategory()
    {
        if(static::countDB("SELECT * FROM `categories` WHERE type = :type AND name = :name ", [':type' => $this->type, ':name' => $this->name]) > 0){
            return false;
        }
        return true;
    }

    public function getResults()
    {
        return $this->results;
    }

    public function __toString(){
        return $this->isCreate;
    }
}
