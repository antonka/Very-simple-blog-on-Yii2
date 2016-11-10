<?php

use yii\db\Migration;

/**
 * @author Anton Karamnov
 */
class m161026_203859_create_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()
        ], 'DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('categories');
    }
}
