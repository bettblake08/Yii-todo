<?php

class UserController extends Controller
{
	public function actionCreate()
	{
		$form = new UserForm;

		if(isset($_POST['UserForm'])){
			$form->attributes = $_POST['UserForm'];
			if(!$form->validate()) throw new CHttpException("Please provide valid inputs for a todo!", 400);
			
			$form->save();
			$this->redirect('/');
		}

		$this->render('create', [
			'model' => $form,
			'users' => UserModel::model()->with('todos')->findAll()
		]);
	}
}