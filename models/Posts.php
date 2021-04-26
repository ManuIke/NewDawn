<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property int $type
 * @property string|null $createdat
 * @property int|null $comments
 * @property string $author
 * @property string $content
 *
 * @property Comments[] $comments0
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'type', 'author', 'content'], 'required'],
            [['type', 'comments'], 'default', 'value' => 0],
            [['type', 'comments'], 'integer'],
            [['createdat'], 'safe'],
            [['createdat'], 'default', 'value' => date('d-m-Y')],
            [['title'], 'string', 'max' => 255],
            [['author'], 'string', 'max' => 25],
            [['content'], 'string', 'max' => 400],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'type' => 'Type',
            'createdat' => 'Createdat',
            'comments' => 'Comments',
            'author' => 'Author',
            'content' => 'Content',
        ];
    }

    /**
     * Gets query for [[Comments0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments0()
    {
        return $this->hasMany(Comments::className(), ['parentpost' => 'id']);
    }
}
