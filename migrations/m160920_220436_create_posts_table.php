<?php

use yii\db\Migration;
use yii\db\Schema;

class m160920_220436_create_posts_table extends Migration
{
    public function up()
    {
        $this->createTable('posts', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . ' NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' DEFAULT NOW()'
        ]);
    }

    public function down()
    {
        $this->dropTable('posts');
    }
}
