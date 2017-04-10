<?php

use yii\db\Migration;

/**
 * @author Anton Karamnov
 */
class m161113_003859_add_user_id_attribute_to_posts_table extends Migration
{
    public function up()
    {
        $this->addColumn('posts', 'user_id', $this->integer()->notNull());
        $this->createIndex(
            'posts_user_id', 
            'posts', 
            'user_id'
        );
        $this->addForeignKey(
            'fk_posts_user_id', 
            'posts', 
            'user_id', 
            'users', 
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk_posts_user_id', 'posts');
        $this->dropColumn('posts', 'user_id');
    }
}
