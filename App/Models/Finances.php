<?php


namespace App\Models;

use Core\Model;

class Finances extends Model
{
    private $type;
    private $category_id;
    private $date;
    private $description;
    private $value;
    private $isCreate;
    private $results;

    public function __construct($user_id, $type, $category_id, $date, $description, $value)
    {
        $this->type = $type;
        $this->category_id = $category_id;
        $this->date = $date;
        $this->description = $description;
        $this->value = $value;

        if(static::actionDB("INSERT INTO finances (user_id, type, category_id, date, description, value) VALUES (:user_id, :type, :category_id, :date, :description, $value )", [':user_id' => $user_id, ':type' => $this->type, ':category_id' => $this->category_id, ':description' => $this->description, ':value' => $this->value])){
            $this->results = 'Category successfully added!.';
            $this->isCreate = 'true';
        } else {
            $this->results = 'Something went wrong! Please try again.';
            $this->isCreate = 'false';
        }
    }

    public function getResults()
    {
        return $this->results;
    }

    public function __toString(){
        return $this->isCreate;
    }
}