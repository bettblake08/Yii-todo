<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Create a Todo</h1>

<div class="form todo-form">
	<?php

	$form=$this->beginWidget('CActiveForm', array(
		'action' => 'create',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	));
	?>

	<div class="row">
		<?php echo $form->labelEx($model, 'title')?>
		<?php echo $form->textField($model, 'title')?>
		<?php echo $form->error($model, 'title')?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'author')?>
		<?php echo $form->dropdownList(
			$model,
			'author_id',
			CHtml::listData($authors, 'id', 'name')
		)?>
		<?php echo $form->error($model, 'author')?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'description')?>
		<?php echo $form->textarea($model, 'description')?>
		<?php echo $form->error($model, 'description')?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>


<br/><br/>

<h1>Todos </h1>
<h2>Todos by todo </h2>

<?php
	foreach($todos as $todo)
	{
		echo "<div class='row'> " . $todo->title . ": " . $todo->description . " (" . $todo->author->name . " at " . $todo->author->email . ") </div>";
	}
?>

<br/><br/><br/><br/>
<h2>Todos by author </h2>

<?php
	foreach($authors as $author)
	{
		echo "<h3>{$author->name} {$author->email}</h3>";

		foreach($author->todos as $todo){
			echo "<div class='row'>{$todo->title}: {$todo->description}</div>";
		}

		echo "<br/><br/>";
	}
?>
