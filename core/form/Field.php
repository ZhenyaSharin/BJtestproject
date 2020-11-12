<?php

namespace App\core\form;


use App\core\Model;

class Field
{
    public $model;
    public string $attribute;

    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }
}