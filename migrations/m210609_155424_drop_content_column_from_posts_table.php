<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%post}}`.
 */
class m210609_155424_drop_content_column_from_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%posts}}', 'content');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%posts}}', 'content', $this->string(1000));
    }
}
