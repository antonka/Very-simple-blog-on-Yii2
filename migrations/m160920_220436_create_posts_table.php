<?php

use yii\db\Migration;

class m160920_220436_create_posts_table extends Migration
{
    public function up()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'content' =>$this->text()->notNull(),
            'created_at' => $this->timestamp() . ' DEFAULT NOW()',
        ]);
    }

    public function down()
    {
        $this->dropTable('posts');
    }
}
