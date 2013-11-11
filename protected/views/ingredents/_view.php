<?php
/* @var $this IngredentsController */
/* @var $data Ingredents */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idingredents')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idingredents), array('view', 'id'=>$data->idingredents)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RECIPE_idRECIPE')); ?>:</b>
	<?php echo CHtml::encode($data->RECIPE_idRECIPE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount_description')); ?>:</b>
	<?php echo CHtml::encode($data->amount_description); ?>
	<br />


</div>