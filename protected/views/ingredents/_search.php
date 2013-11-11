<?php
/* @var $this IngredentsController */
/* @var $model Ingredents */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idingredents'); ?>
		<?php echo $form->textField($model,'idingredents'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RECIPE_idRECIPE'); ?>
		<?php echo $form->textField($model,'RECIPE_idRECIPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount_description'); ?>
		<?php echo $form->textField($model,'amount_description',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->