<?php

class m190725_151759_create_todo_users_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('users', [
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'email' => 'string NOT NULL',
			'password' => 'string NOT NULL'
		]);
	}

	public function down()
	{
		$this->dropTable('users');
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