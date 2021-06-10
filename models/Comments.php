<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $text
 * @property int|null $parentPost
 *
 * @property Posts $parentPost0
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
            [['text','author'], 'required'],
            [['createdAt'], 'safe'],
            [['parentPost'], 'default', 'value' => null],
            [['parentPost'], 'integer'],
            [['text','author'], 'string', 'max' => 255],
            [['parentPost'], 'exist', 'skipOnError' => true, 'targetClass' => Posts::className(), 'targetAttribute' => ['parentPost' => 'id']],
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
            'parentPost' => 'Parent Post',
        ];
    }

    /**
     * Gets query for [[ParentPost0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParentPost0()
    {
        return $this->hasOne(Posts::className(), ['id' => 'parentPost']);
    }
}
