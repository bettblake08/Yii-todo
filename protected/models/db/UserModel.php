<?php

class UserModel extends CActiveRecord
{
	public $name;
	public $email;
	public $password;

    public static function model($className = __CLASS__)
	{
		return parent::model($className);
    }

    public function relations(){
		return [
			'todos' => [self::HAS_MANY, 'TodoModel' , 'author_id']
		];
    }

    public function tableName()
    {
        return 'users';
    }

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
            ['name, email, password', 'required'],
            ['email', 'email']                       
		);
    }
    
    protected function beforeSave(){
        $newPassword = crypt($this->password, 'testAuthentication');
        if($newPassword) $this->password = $newPassword;
        return !!$newPassword;
    }
}