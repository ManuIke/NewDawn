<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property string $type
 * @property string|null $createdAt
 * @property int|null $comments
 * @property string $author
 * @property string|null $content
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
            [['title', 'type', 'author','content'], 'required'],
            [['createdAt'], 'safe'],
            [['comments'], 'default', 'value' => null],
            [['comments'], 'integer'],
            [['title', 'type', 'author'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 1000],
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
            'createdAt' => 'Created At',
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
        return $this->hasMany(Comments::className(), ['parentPost' => 'id']);
    }
}
