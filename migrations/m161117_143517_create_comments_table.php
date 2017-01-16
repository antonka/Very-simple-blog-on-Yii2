<?php

use yii\db\Migration;

/**
 * @author Anton Karamnov
 */
class m161117_143517_create_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->null(),
            'post_id' => $this->integer()->notNull(),
            'username' => $this->string(30)->null(),
            'email' => $this->string(320)->null(),
            'content' => $this->string(2000)->notNull(),
            'created_at' => $this->timestamp() . ' DEFAULT NOW()',
            'status' => 'ENUM("publicated", "moderation") NOT NULL',
        ], 'DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci');
        
        $this->createIndex(
            'comments_user_id', 
            'comments', 
            'user_id'
        );
        
        $this->addForeignKey(
            'fk_comments_user_id', 
            'comments', 
            'user_id', 
            'users', 
            'id',
            'CASCADE'
        );
       
        $this->createIndex(
            'comments_post_id', 
            'comments', 
            'post_id'
        );
        $this->addForeignKey(
            'fk_comments_post_id', 
            'comments', 
            'post_id', 
            'posts', 
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comments');
    }
}
