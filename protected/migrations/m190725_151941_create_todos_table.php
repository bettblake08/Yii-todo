<?php

class m190725_151941_create_todos_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('todos', [
			'id' => 'pk',
			'author_id' => 'int NOT NULL',
			'title' => 'string NOT NULL',
			'description' => 'text'
		]);

		// add foreign key for table `post`
        $this->addForeignKey(
            'fk-todo-author',
            'todos',
            'author_id',
            'users',
            'id',
            'CASCADE'
        );
	}

	public function down()
	{
		$this->dropTable('todos');
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