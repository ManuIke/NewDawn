<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m210506_061402_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(25)->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'posts' => $this->integer(),
            'comments' => $this->integer(),
            'role' => $this->string()->notNull(),
            'banned' => $this->boolean(),
            'banreason' => $this->string(400)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
