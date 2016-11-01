<?php

use yii\db\Migration;

/**
 * @author Anton Karamnov
 */
class m161101_011620_create_table_posts_categories extends Migration
{
    public function up()
    {
        $this->createTable('posts_categories', [
           'post_id' => $this->integer()->notNull(),
           'category_id' => $this->integer()->notNull(),
        ]);
        
        $this->createIndex(
            'posts_categories_post_id', 
            'posts_categories', 
            'post_id'
        );
        
        $this->addForeignKey(
            'fk_posts_categories_post_id', 
            'posts_categories', 
            'post_id', 
            'posts', 
            'id',
            'CASCADE'
        );
        
        $this->createIndex(
            'posts_categories_category_id', 
            'posts_categories', 
            'category_id'
        );
        
        $this->addForeignKey(
            'fk_posts_categories_category_id', 
            'posts_categories', 
            'category_id', 
            'categories', 
            'id',
            'CASCADE'
        );
        
    }

    public function down()
    {
        $this->dropTable('posts_categories');
    }
}
