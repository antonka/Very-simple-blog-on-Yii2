<?php

use yii\db\Migration;

class m161112_225031_rename_password_to_password_hash_in_users_table extends Migration
{
    public function up()
    {
        $this->renameColumn('users', 'password', 'password_hash');
    }

    public function down()
    {
        $this->renameColumn('users', 'password_hash', 'password');
    }
}
