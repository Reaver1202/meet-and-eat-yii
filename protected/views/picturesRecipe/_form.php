<?php
/* @var $this PicturesRecipeController */
/* @var $model PicturesRecipe */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pictures-recipe-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idPICTURES_RECIPE'); ?>
		<?php echo $form->textField($model,'idPICTURES_RECIPE'); ?>
		<?php echo $form->error($model,'idPICTURES_RECIPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_name'); ?>
		<?php echo $form->textField($model,'file_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'file_name'); ?>
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