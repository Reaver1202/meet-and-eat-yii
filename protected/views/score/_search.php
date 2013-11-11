<?php
/* @var $this ScoreController */
/* @var $model Score */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idSCORE'); ?>
		<?php echo $form->textField($model,'idSCORE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USER_idUser'); ?>
		<?php echo $form->textField($model,'USER_idUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id_target'); ?>
		<?php echo $form->textField($model,'user_id_target',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id_source'); ?>
		<?php echo $form->textField($model,'user_id_source',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score'); ?>
		<?php echo $form->textField($model,'score'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->