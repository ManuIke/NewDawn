<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int|null $posts
 * @property int|null $comments
 * @property string $role
 * @property bool|null $banned
 * @property string|null $banreason
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'role'], 'required'],
            [['posts', 'comments'], 'default', 'value' => null],
            [['posts', 'comments'], 'integer'],
            [['banned'], 'boolean'],
            [['username'], 'string', 'max' => 25],
            [['password', 'role'], 'string', 'max' => 255],
            [['banreason'], 'string', 'max' => 400],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'posts' => 'Posts',
            'comments' => 'Comments',
            'role' => 'Role',
            'banned' => 'Banned',
            'banreason' => 'Banreason',
        ];
    }
}
