<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%comments}}`.
 */
class m210610_111539_add_author_column_createdAt_column_to_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%comments}}', 'author', $this->string());
        $this->addColumn('{{%comments}}', 'createdAt', $this->timestamp());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%comments}}', 'author');
        $this->dropColumn('{{%comments}}', 'createdAt');
    }
}
