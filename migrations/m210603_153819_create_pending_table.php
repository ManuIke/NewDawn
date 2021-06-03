<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pending}}`.
 */
class m210603_153819_create_pending_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pending}}', [
            'id' => $this->bigInteger(),
            'created_at' => $this->timestamp(0)->defaultExpression('LOCALTIMESTAMP'),
            'token' => $this->string(255),
        ]);

        $this->addPrimaryKey('pk_pending', 'pending', 'id');
        $this->addForeignKey(
            'fk_pending_users',
            'pending',
            'id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_pending_users', 'pending');
        $this->dropTable('{{%pending}}');
    }
}
