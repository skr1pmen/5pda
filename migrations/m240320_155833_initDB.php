<?php

use yii\db\Migration;

class m240320_155833_initDB extends Migration
{
    public function safeUp()
    {
        $this->createTable("users", [
            'id' => $this->primaryKey(),
            'login' => $this->string(50)->notNull(),
            'password' => $this->string()->notNull(),
            'photo' => $this->string()
        ]);
        $this->createTable('sections', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
        ]);
        $this->createTable('subsections', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'section_id' => $this->integer()->notNull(),
        ]);
        $this->createTable('topics', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'subsection_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);
        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
            'topic_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'date' => $this->timestamp()->defaultExpression("NOW()"),
        ]);

        $this->insert('users', [
            'login' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT)
        ]);

        $this->addForeignKey(
            'message_to_topic_fk',
            'messages',
            'topic_id',
            'topics',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'message_to_user_fk',
            'messages',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'topic_to_subsection_fk',
            'topics',
            'subsection_id',
            'subsections',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'topic_to_user_fk',
            'topics',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'subsection_to_section_fk',
            'subsections',
            'section_id',
            'sections',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }


    public function safeDown()
    {
        $this->dropTable("messages");
        $this->dropTable("topics");
        $this->dropTable("subsections");
        $this->dropTable("sections");
        $this->dropTable("users");
    }
}
