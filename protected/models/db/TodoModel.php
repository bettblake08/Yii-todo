<?php

class TodoModel extends CActiveRecord
{
	public $title;
	public $description;
	public $author_id;

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function relations(){
		return [
			'author' => [self::BELONGS_TO, 'UserModel' , 'author_id']
		];
	}

    public function tableName()
    {
        return 'todos';
    }

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			['title, author_id, description', 'required']
		);
	}
}