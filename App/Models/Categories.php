<?php


namespace App\Models;

use Core\Model;

class Categories extends Model
{
    private $type;
    private $name;

    public function __construct($type, $name)
    {
        $this->type = $type;
        $this->name = $name;
        static::actionDB("INSERT INTO categories (type, name) VALUES ($type,$name)");
    }

    public function setType($type)
    {
        $this->type = $type;
        static::actionDB("UPDATE categories SET type = $type");
    }

    public function setName($name)
    {
        $this->name = $name;
        static::actionDB("UPDATE categories SET name = $name");
    }

}
