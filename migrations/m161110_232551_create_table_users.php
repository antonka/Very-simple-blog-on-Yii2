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
            'password' => $this->string(64)->null(),
            'role' => 'ENUM("owner", "commentator") NOT NULL',
        ], 'DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci');
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
