<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wiki".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string $category1
 * @property string|null $category2
 * @property string|null $category3
 */
class Wiki extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wiki';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','category1','description'], 'required'],
            [['name', 'category1', 'category2', 'category3'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 2000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'category1' => 'Category1',
            'category2' => 'Category2',
            'category3' => 'Category3',
        ];
    }
}
