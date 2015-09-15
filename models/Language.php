<?php

namespace adz\yii2\language\models;

use Yii;
use yii\base\Model;
use adz\yii2\language\models\Source;
use adz\yii2\language\models\Message;

class Language extends Model
{
    public function loadMessagesFromDb($language)
    {
        return [
            'source' => $this->getSource(),
            'message' => $this->getMessage($language),
        ];
    }

    public function saveTranslation($id, $language, $translation)
    {
        $message = Message::find()->where(['id' => $id, 'language' => $language])->one();
        $message->translation = $translation;
        return $message->save();
    }

    private function getSource()
    {
        $source = Source::find()->all();
        return $source;
    }

    private function getMessage($language)
    {
        $message = Message::find()->where(['language' => $language])->all();
        return $message;
    }
}
