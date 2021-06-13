<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wiki}}`.
 */
class m210613_104406_create_wiki_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wiki}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(2000),
            'category1' => $this->string()->notNull(),
            'category2' => $this->string(),
            'category3' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wiki}}');
    }
}
