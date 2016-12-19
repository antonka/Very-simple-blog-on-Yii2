<?php

use yii\db\Migration;

/**
 * @author Anton Karamnov
 */
class m161219_191434_create_tasks_table extends Migration
{
    public function up()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'group_id' => $this->string(100)->notNull(),
            'action' => $this->string(100)->notNull(),
            'data' => $this->text()->notNull(),
            'created_at' => $this->timestamp() . ' DEFAULT NOW()',
            'status' => 'ENUM("pending", "executed") NOT NULL DEFAULT "pending"',
            'execution_order' => $this->integer()->notNull(),
        ]);
        
        $this->createIndex('tasks_group_id', 'tasks', 'group_id');
    }

    public function down()
    {
        $this->dropTable('tasks');
    }
}