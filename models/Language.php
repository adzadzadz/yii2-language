<?php

namespace app\modules\yii2language\models;

use Yii;
use yii\base\Model;
use app\modules\yii2language\models\Source;
use app\modules\yii2language\models\Message;

class Language extends Model
{
    public function loadMessagesFromDb()
    {
        return [
            'source' => $this->getSource(),
            'message' => $this->getMessage(),
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

    private function getMessage()
    {
        $message = Message::find()->all();
        return $message;
    }
}
