<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>User Registration</h1>

<div class="form user-form">
	<?php
	$form=$this->beginWidget('CActiveForm', array(
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	));
	?>

	<div class="row">
		<?php echo $form->labelEx($model, 'name')?>
		<?php echo $form->textField($model, 'name')?>
		<?php echo $form->error($model, 'name')?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'email')?>
		<?php echo $form->textarea($model, 'email')?>
		<?php echo $form->error($model, 'email')?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'password')?>
		<?php echo $form->passwordField($model, 'password')?>
		<?php echo $form->error($model, 'password')?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

	<?php $this->endWidget(); ?>
</div>

<br /><br /><br />
<h1>Users </h1>

<?php
	foreach($users as $user)
	{
		$count = count($user->todos);
		echo "<div class='row'>{$user->name} - {$user->email} Todo : {$count}</div>";
	}
?>
