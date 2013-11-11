<?php
/* @var $this CoursesController */
/* @var $model Courses */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idCOURSES'); ?>
		<?php echo $form->textField($model,'idCOURSES'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_number'); ?>
		<?php echo $form->textField($model,'course_number',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EVENTS_idEVENTS'); ?>
		<?php echo $form->textField($model,'EVENTS_idEVENTS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RECIPE_idRECIPE'); ?>
		<?php echo $form->textField($model,'RECIPE_idRECIPE'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->