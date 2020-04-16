<?php


namespace App\Models;

use Core\Model;

class Finance extends Model
{
    private string $type;
    private int $category_id;
    private string $date;
    private string $description;
    private string $value;
    private string $isCreate;
    private string $results;

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function saveToDatabase()
    {

        if(static::actionDB("INSERT INTO finances (user_id, type, category_id, date, description, value) VALUES (:user_id, :type, :category_id, :date, :description, :value )", [':user_id' => $_SESSION['user_id'], ':type' => $this->type, ':category_id' => $this->category_id, ':date' => $this->date, ':description' => $this->description, ':value' => $this->value])){
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

    public function getIsCreate()
    {
        return $this->isCreate;
    }


    public function getCategories()
    {
        return static::fetchAllDB("SELECT id, name FROM categories WHERE type = :type" , [':type' => $this->type]);
    }


}