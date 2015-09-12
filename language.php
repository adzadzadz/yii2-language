<?php

namespace app\modules\yii2language;

class Language extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\yii2language\controllers';

    public function init()
    {
        parent::init();

        \Yii::setAlias('@yii2language', __DIR__ );
        // custom initialization code goes here
    }
}