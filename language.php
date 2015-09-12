<?php

namespace adz\yii2\language;

class Language extends \yii\base\Module
{
    public $controllerNamespace = 'adz\yii2\language\controllers';

    public function init()
    {
        parent::init();

        \Yii::setAlias('@yii2language', __DIR__ );
        // custom initialization code goes here
    }
}