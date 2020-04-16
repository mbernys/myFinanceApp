<?php


namespace App\Models;

use Core\Model;

class Category extends Model
{
    private string $type;
    private string $name;
    private string $results;
    private string $isCreate;

    public function saveToDatabase()
    {
        if (self::checkCategory()) {
            if (static::actionDB("INSERT INTO `categories` (type, name) VALUES ( :type, :name )", [':type' => $this->type, ':name' => $this->name])) {
                $this->results = 'Category successfully added!.';
                return true;
            } else {
                $this->results = 'Something went wrong! Please try again.';
            }
        } else {
                $this->results = 'This category already exist!';
            }
        return false;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function getType(){
        return $this->type;
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
