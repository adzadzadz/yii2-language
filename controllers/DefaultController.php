<?php

namespace app\modules\yii2language\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
    	// $this->layout = 'strepz_guest';
        return $this->render('index');
    }
}
