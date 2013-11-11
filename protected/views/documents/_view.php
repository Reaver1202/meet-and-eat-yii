<?php
/* @var $this DocumentsController */
/* @var $data Documents */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDOCUMENTS')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idDOCUMENTS), array('view', 'id'=>$data->idDOCUMENTS)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_name')); ?>:</b>
	<?php echo CHtml::encode($data->file_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RECIPE_idRECIPE')); ?>:</b>
	<?php echo CHtml::encode($data->RECIPE_idRECIPE); ?>
	<br />


</div>