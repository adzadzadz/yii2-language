<?php

use yii\db\Schema;
use yii\db\Migration;

class m150910_014555_create_language_set_tables extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%language_source}}', [
            'id' => Schema::TYPE_PK,
            'category' => Schema::TYPE_STRING . ' NOT NULL',
            'message' => Schema::TYPE_TEXT . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%language_message}}', [
            'id' => Schema::TYPE_INTEGER,
            'language' => Schema::TYPE_STRING . ' NOT NULL',
            'translation' => Schema::TYPE_TEXT . ' NOT NULL',
        ], $tableOptions);

        // CONSTRAINT fk_message_source_message FOREIGN KEY (id)
        // REFERENCES source_message (id) ON DELETE CASCADE ON UPDATE RESTRICT
        $this->addPrimaryKey( '', '{{%language_message}}', ['id', 'language'] );
        $this->addForeignKey( 'fk_message_source_message', '{{%language_message}}', 'id', '{{%language_source}}', 'id', $delete = 'CASCADE', $update = 'RESTRICT' );
    }

    public function down()
    {
        echo "m150910_014555_create_language_set_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
