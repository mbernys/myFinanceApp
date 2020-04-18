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

        if(static::actionDB("INSERT INTO finances (user_id, type, description, category_id, value, date) VALUES (:user_id, :type, :description, :category_id , :value , :date )", [':user_id' => $_SESSION['user_id'], ':type' => $this->type, ':category_id' => $this->category_id, ':date' => $this->date, ':description' => $this->description, ':value' => $this->value])){
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

    public function getBalance(string $date, string $format)
    {
        $incomesSum = static::fetchOneRowFromDB("SELECT SUM(value) as sum_incomes FROM finances WHERE type='Incomes' AND DATE_FORMAT(date,:format) = DATE_FORMAT(:date,:format)",[':date' => $date , ':format' => $format],'sum_incomes');
        $expensesSum = static::fetchOneRowFromDB("SELECT SUM(value) as sum_expenses FROM finances WHERE type='Expenses' AND DATE_FORMAT(date,:format) = DATE_FORMAT(:date,:format)",[':date' => $date , ':format' => $format],'sum_expenses');

        return $incomesSum - $expensesSum;
    }

    public function getPeriod(string $format){

        return static::fetchAllDB("SELECT f.date as date, c.name as category, f.description as description, f.type as type , f.value as value FROM finances f, categories c WHERE f.category_id = c.id AND DATE_FORMAT(date,:format) = DATE_FORMAT(date,:format)" , [':format' => $format]);

    }

}