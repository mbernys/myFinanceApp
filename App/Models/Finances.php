<?php


namespace App\Models;

use Core\Model;

class Finances extends Model
{
    private $type;
    private $category_id;
    private $month;
    private $year;
    private $value;

    public function __construct($user_id, $type, $category_id, $month, $year, $value)
    {
        $this->type = $type;
        $this->category_id = $category_id;
        $this->month = $month;
        $this->year = $year;
        $this->value = $value;

        static::actionDB("INSERT INTO finances (user_id, type, category_id, month, year, value) VALUES ( ($user_id, $type, $category_id, $month, $year, $value )");
    }
}