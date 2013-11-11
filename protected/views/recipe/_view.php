<?php
/* @var $this RecipeController */
/* @var $data Recipe */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRECIPE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idRECIPE), array('view', 'id'=>$data->idRECIPE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_idUser')); ?>:</b>
	<?php echo CHtml::encode($data->USER_idUser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manual')); ?>:</b>
	<?php echo CHtml::encode($data->manual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_of_persons')); ?>:</b>
	<?php echo CHtml::encode($data->number_of_persons); ?>
	<br />


</div>