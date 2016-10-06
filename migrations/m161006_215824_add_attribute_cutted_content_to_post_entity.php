<?php

use yii\db\Migration;

class m161006_215824_add_attribute_cutted_content_to_post_entity extends Migration
{
    public function up()
    {
        $this->addColumn(
            'posts', 'cutted_content', $this->string(500)
        );
    }

    public function down()
    {
        $this->dropColumn('posts', 'cutted_content');
    }
}
