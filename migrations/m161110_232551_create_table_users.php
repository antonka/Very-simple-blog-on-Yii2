<?php

use yii\db\Migration;

/**
 * @author Anton Karamnov
 */
class m161110_232551_create_table_users extends Migration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'email' => $this->string(255)->notNull(),
            'name' => $this->string(50)->notNull(),
            'password' => $this->string(64)->notNull(),
            'role' => $this->string(50)->notNull(),
        ], 'DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci');
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
