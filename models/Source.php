<?php

namespace app\modules\yii2language\models;

use Yii;

/**
 * This is the model class for table "{{%language_source}}".
 *
 * @property integer $id
 * @property string $category
 * @property string $message
 *
 * @property LanguageMessage[] $languageMessages
 */
class Source extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%language_source}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_glb_sys');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'message'], 'required'],
            [['message'], 'string'],
            [['category'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', 'Category'),
            'message' => Yii::t('app', 'Message'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguageMessages()
    {
        return $this->hasMany(LanguageMessage::className(), ['id' => 'id']);
    }
}
