<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%task}}`.
 */
class m231128_111832_add_created_by_column_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%task}}', '[[created_by]]', 'integer');

        $this->addForeignKey('fk_task_created_by', '{{%task}}', '[[created_by]]', '{{%user}}', '[[id]]');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%task}}', '[[created_by]]');
        $this->dropForeignKey('fk_task_created_by', '{{%task}}');
    }
}
