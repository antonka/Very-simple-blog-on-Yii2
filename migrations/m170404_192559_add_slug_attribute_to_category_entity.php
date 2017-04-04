<?php

use yii\db\Migration;

/**
 * @author Anton Karamnov
 */
class m170404_192559_add_slug_attribute_to_category_entity extends Migration
{
    public function up()
    {
        $this->addColumn('categories', 'slug', $this->string(50));
        $this->createIndex('categories_slug', 'categories', 'slug');
    }

    public function down()
    {
        $this->dropColumn('categories', 'slug');
    }
}
