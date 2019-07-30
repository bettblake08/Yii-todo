<?php

class UserForm extends CFormModel
{
	public $name;
    public $email;
    public $password;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			['name, email, password','required'],
			['email', 'email'],
		);
	}

	public function save(){
		$user = new UserModel;
		$user->attributes = $this->attributes;
		$user->save();
	}
}