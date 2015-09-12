<?php

namespace adz\yii2\language\models;

use Yii;

/**
 * This is the model class for table "{{%language_message}}".
 *
 * @property integer $id
 * @property string $language
 * @property string $translation
 *
 * @property LanguageSource $id0
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%language_message}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    // public static function getDb()
    // {
    //     return Yii::$app->get('db_glb_sys');
    // }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'language', 'translation'], 'required'],
            [['id'], 'integer'],
            [['translation'], 'string'],
            [['language'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'language' => Yii::t('app', 'Language'),
            'translation' => Yii::t('app', 'Translation'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(LanguageSource::className(), ['id' => 'id']);
    }
}