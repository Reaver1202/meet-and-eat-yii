<?php
/* @var $this ScoreController */
/* @var $model Score */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'score-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'USER_idUser'); ?>
		<?php echo $form->textField($model,'USER_idUser'); ?>
		<?php echo $form->error($model,'USER_idUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id_target'); ?>
		<?php echo $form->textField($model,'user_id_target',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'user_id_target'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id_source'); ?>
		<?php echo $form->textField($model,'user_id_source',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'user_id_source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'score'); ?>
		<?php echo $form->textField($model,'score'); ?>
		<?php echo $form->error($model,'score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->