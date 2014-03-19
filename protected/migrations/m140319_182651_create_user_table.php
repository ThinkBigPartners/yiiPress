<?php

class m140319_182651_create_user_table extends CDbMigration
{
	public function up() {
		$this->createTable('user', array(
            'id' => 'char(36) NOT NULL',
            'email' => 'varchar(64)',
            'password' => 'varchar(64)',
            'fullName' => 'varchar(32)',
            'admin' => 'boolean DEFAULT 0',
            'updatedAt' => 'timestamp',
            'createdAt' => 'timestamp',
            'apiToken' => 'varchar(64)',
            'forgotPasswordToken' => 'varchar(64)',
            'PRIMARY KEY (`id`)'
        ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
	}

	public function down() {
		$this->dropTable('user');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}