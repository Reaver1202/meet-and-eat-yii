<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_guests'); ?>
		<?php echo $form->textField($model,'max_guests'); ?>
		<?php echo $form->error($model,'max_guests'); ?>
	</div>

	<div class="row">
	<?php 
		//print_r(CHtml::listData(Recipe::model()->findAll(),'idRECIPE','name'));
		echo $form->labelEx($model_course,'RECIPE_idRECIPE'); 
		echo $form->dropDownList($model_course,'RECIPE_idRECIPE',CHtml::listData(Recipe::model()->findAll(),'idRECIPE','name'));
		echo $form->error($model_course,'RECIPE_idRECIPE');
	?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->