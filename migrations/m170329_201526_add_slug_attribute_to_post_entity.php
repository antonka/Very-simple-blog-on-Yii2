<?php

use yii\db\Migration;

/**
 * @author Anton Karamnov
 */
class m170329_201526_add_slug_attribute_to_post_entity extends Migration
{
    public function up()
    {
        $this->addColumn('posts', 'slug', $this->string(100));
        $this->createIndex('posts_slug', 'posts', 'slug', true);
    }

    public function down()
    {
        $this->dropColumn('posts', 'slug');
    }
}
