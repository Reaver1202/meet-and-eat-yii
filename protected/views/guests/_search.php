<?php
/* @var $this GuestsController */
/* @var $model Guests */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idGUESTS'); ?>
		<?php echo $form->textField($model,'idGUESTS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EVENTS_idEVENTS'); ?>
		<?php echo $form->textField($model,'EVENTS_idEVENTS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USER_idUser'); ?>
		<?php echo $form->textField($model,'USER_idUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approved'); ?>
		<?php echo $form->textField($model,'approved'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->