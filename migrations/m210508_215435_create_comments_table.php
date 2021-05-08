<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%posts}}`
 */
class m210508_215435_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string()->notNull(),
            'parentPost' => $this->integer(),
        ]);

        // creates index for column `parentPost`
        $this->createIndex(
            '{{%idx-comments-parentPost}}',
            '{{%comments}}',
            'parentPost'
        );

        // add foreign key for table `{{%posts}}`
        $this->addForeignKey(
            '{{%fk-comments-parentPost}}',
            '{{%comments}}',
            'parentPost',
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
            '{{%fk-comments-parentPost}}',
            '{{%comments}}'
        );

        // drops index for column `parentPost`
        $this->dropIndex(
            '{{%idx-comments-parentPost}}',
            '{{%comments}}'
        );

        $this->dropTable('{{%comments}}');
    }
}
