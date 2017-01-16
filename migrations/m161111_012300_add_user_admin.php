<?php

use yii\db\Migration;

/**
 * @author Anton Karamnov
 */
class m161111_012300_add_user_admin extends Migration
{
    public function up()
    {
        $this->db->createCommand()->insert('users', [
            'name' => 'Owner Name',
            'email' => 'example@email.com',
            'password' => '$2y$13$ROVH3sSycp6vIFsHC9guuOAYyoKHf4WAx7v2YtswdrjhoiXEAZp5S', // password
            'role' => 'admin',
        ])->execute();
    }

    public function down()
    {
        $this->db->createCommand()->delete('users')->execute();
    }
}