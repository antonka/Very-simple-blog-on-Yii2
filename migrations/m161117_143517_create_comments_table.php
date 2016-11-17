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
            'user_id' => $this->integer()->notNull(),
            'content' => $this->string(2000)->notNull(),
            'created_at' => $this->timestamp() . ' DEFAULT NOW()',
            'status' => 'ENUM("publicated", "moderation") NOT NULL',
        ], 'DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comments');
    }
}
