<?php


namespace App\Models;

use Core\Model;

class Finance extends Model
{
    private $type;
    private $category_id;
    private $date;
    private $description;
    private $value;
    private $isCreate;
    private $results;
    private $categories = [];

    public function __construct($type)
    {
        $this->type = $type;

    }

    public function addToDB($user_id, $category_id, $date, $description, $value)
    {

        $this->category_id = $category_id;
        $this->date = $date;
        $this->description = $description;
        $this->value = $value;

        if(static::actionDB("INSERT INTO finances (user_id, type, category_id, date, description, value) VALUES (:user_id, :type, :category_id, :date, :description, :value )", [':user_id' => $user_id, ':type' => $this->type, ':category_id' => $this->category_id, ':date' => $this->date, ':description' => $this->description, ':value' => $this->value])){
            $this->results = 'Value successfully added!.';
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

    /**
     * @return mixed
     */
    public function getIsCreate()
    {
        return $this->isCreate;
    }


    public function getCategories()
    {
        return static::fetchAllDB("SELECT id, name FROM categories WHERE type = :type" , [':type' => $this->type]);
    }


}