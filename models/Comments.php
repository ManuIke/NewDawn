<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $text
 * @property int $parentpost
 *
 * @property Posts $parentpost0
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'parentpost'], 'required'],
            [['parentpost'], 'default', 'value' => null],
            [['parentpost'], 'integer'],
            [['text'], 'string', 'max' => 255],
            [['parentpost'], 'exist', 'skipOnError' => true, 'targetClass' => Posts::className(), 'targetAttribute' => ['parentpost' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'parentpost' => 'Parentpost',
        ];
    }

    /**
     * Gets query for [[Parentpost0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParentpost0()
    {
        return $this->hasOne(Posts::className(), ['id' => 'parentpost']);
    }
}
