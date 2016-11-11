<?php

use yii\db\Migration;

/**
 * @author Anton Karamnov
 */
class m161111_012300_add_blog_owner extends Migration
{
    public function up()
    {
        $this->db->createCommand()->insert('users', [
            'name' => 'Owner Name',
            'email' => 'example@email.com',
            'password' => '$2y$13$ROVH3sSycp6vIFsHC9guuOAYyoKHf4WAx7v2YtswdrjhoiXEAZp5S', // password
            'role' => 'owner',
        ])->execute();
    }

    public function down()
    {
        $this->db->createCommand()->delete('users')->execute();
    }
}