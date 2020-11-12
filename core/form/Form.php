<?php

namespace App\core\form;

use App\core\form\Field;
use App\core\Model;

class Form
{
    public static function begin($action, $method)
    {
        echo "<form action='$action' method='$method'>";
        return new Field();
    }

    public static function end()
    {
        return "</form>";
    }

    public function field(Model $model, $attribute)
    {

    }
}