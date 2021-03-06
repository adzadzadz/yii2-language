<?php

namespace adz\yii2\language\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use adz\yii2\language\models\Language;

class DefaultController extends Controller
{
    // Enable language on all pages rendered by this controller.
    public function init()
    {
        \Yii::$app->language = \Yii::$app->request->cookies->getValue('language', 'en-US');
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'translate', 'update'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index', 'translate', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'update' => ['post'],
                    'language' => ['post'],
                ],
            ],
        ];
    }

    /**
     *
     * actionLanguage is used to shift between languages.
     * Only supports POST method using POST name 'language'.
     *
     */
    public function actionLanguage()
    {
        $cookies = \Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => 'language',
            'value' => \Yii::$app->request->post()['language'],
        ]));
        return $this->goBack();
    }

    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('index', [
                'config' => require(__DIR__ . '/../config.php'),
            ]);
        }
        return $this->goHome();
    }

    public function actionTranslate($language)
    {
        $message = new Language;
        return $this->render('translate', [
            'config' => require(__DIR__ . '/../config.php'),
            'language' => $language,
            'translation' => $message->loadMessagesFromDb($language),
        ]);

    }

    public function actionUpdate()
    {
        if (\Yii::$app->request->isAjax) {

            $translate = new Language();

            if ($translate->saveTranslation(\Yii::$app->request->post()['id'], \Yii::$app->request->post()['language'], \Yii::$app->request->post()['translation'])) {
                return 'saved';
            }
            return 'failed';
        }
        return $this->goHome();
    }
}