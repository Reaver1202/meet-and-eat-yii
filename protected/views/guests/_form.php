<?php
/* @var $this GuestsController */
/* @var $model Guests */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guests-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'EVENTS_idEVENTS'); ?>
		<?php echo $form->textField($model,'EVENTS_idEVENTS'); ?>
		<?php echo $form->error($model,'EVENTS_idEVENTS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USER_idUser'); ?>
		<?php echo $form->textField($model,'USER_idUser'); ?>
		<?php echo $form->error($model,'USER_idUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'approved'); ?>
		<?php echo $form->textField($model,'approved'); ?>
		<?php echo $form->error($model,'approved'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->