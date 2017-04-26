<?php

use yii\db\Migration;

/**
 * @author Anton Karamnov
 */
class m170426_201949_add_description_attribute_to_post_model extends Migration
{
    public function up()
    {
        $this->addColumn('posts', 'description', $this->string(500));
    }

    public function down()
    {
        $this->dropColumn('posts', 'description');
    }
}
