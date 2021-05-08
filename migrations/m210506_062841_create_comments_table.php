<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%posts}}`
 */
class m210506_062841_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string()->notNull(),
            'parentpost' => $this->integer()->notNull(),
        ]);

        // creates index for column `parentpost`
        $this->createIndex(
            '{{%idx-comments-parentpost}}',
            '{{%comments}}',
            'parentpost'
        );

        // add foreign key for table `{{%posts}}`
        $this->addForeignKey(
            '{{%fk-comments-parentpost}}',
            '{{%comments}}',
            'parentpost',
            '{{%posts}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%posts}}`
        $this->dropForeignKey(
            '{{%fk-comments-parentpost}}',
            '{{%comments}}'
        );

        // drops index for column `parentpost`
        $this->dropIndex(
            '{{%idx-comments-parentpost}}',
            '{{%comments}}'
        );

        $this->dropTable('{{%comments}}');
    }
}
