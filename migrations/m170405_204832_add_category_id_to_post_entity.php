<?php

use yii\db\Migration;

class m170405_204832_add_category_id_to_post_entity extends Migration
{
    public function up()
    {
        $this->addColumn('posts', 'category_id', $this->integer()->notNull());
        
        $this->createIndex(
            'posts_category_id', 
            'posts', 
            'category_id'
        );
        
        $this->addForeignKey(
            'fk_posts_posts_category_id', 
            'posts', 
            'category_id', 
            'categories', 
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk_posts_posts_category_id', 'posts');
        $this->dropColumn('posts', 'category_id');
    }
}
