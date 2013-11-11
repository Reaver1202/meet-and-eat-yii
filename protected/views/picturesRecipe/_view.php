<?php
/* @var $this PicturesRecipeController */
/* @var $data PicturesRecipe */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPICTURES_RECIPE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPICTURES_RECIPE), array('view', 'id'=>$data->idPICTURES_RECIPE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_name')); ?>:</b>
	<?php echo CHtml::encode($data->file_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RECIPE_idRECIPE')); ?>:</b>
	<?php echo CHtml::encode($data->RECIPE_idRECIPE); ?>
	<br />


</div>