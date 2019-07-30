<?php

class TodoForm extends CFormModel
{
	public $title;
	public $description;
	public $author_id;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			['title, author_id, description', 'required'],
			['author_id', 'numerical']
		);
	}

	public function save(){
		$todo = new TodoModel;
		$todo->attributes = $this->attributes;
		$todo->save();
	}
}