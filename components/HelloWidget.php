<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class HelloWidget extends Widget
{
    public $name;
    public $value;

    public function init()
    {
        parent::init();
        if ($this->name === null) {
            $this->name = '';
        }
    }

    public function run()
    {
       return   "<input type='text' name='".$this->name."' value='".$this->value."'";
    }
}

?>