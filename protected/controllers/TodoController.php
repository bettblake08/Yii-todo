<?php

class TodoController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionView()
	{	
		$this->render('view', [
			'model' => new TodoForm,
			'authors' => UserModel::model()->findAll(),
			'todos' => TodoModel::model()->with('author')->findAll()
		]);
	}


	public function actionCreate()
	{
		if(isset($_POST['TodoForm'])){
			$todoForm = new TodoForm;
			$todoForm->attributes = $_POST['TodoForm'];

			if(!$todoForm->validate()) throw new CHttpException("Please provide valid inputs for a todo!", 400);
			$todoForm->save();
		}
		
		$this->redirect('/todo/view');
	}
}