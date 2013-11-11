<?php
/* @var $this CoursesController */
/* @var $model Courses */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'courses-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'course_number'); ?>
		<?php echo $form->textField($model,'course_number',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'course_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EVENTS_idEVENTS'); ?>
		<?php echo $form->textField($model,'EVENTS_idEVENTS'); ?>
		<?php echo $form->error($model,'EVENTS_idEVENTS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RECIPE_idRECIPE'); ?>
		<?php echo $form->textField($model,'RECIPE_idRECIPE'); ?>
		<?php echo $form->error($model,'RECIPE_idRECIPE'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->