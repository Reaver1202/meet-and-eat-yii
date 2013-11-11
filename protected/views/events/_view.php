<?php
/* @var $this EventsController */
/* @var $data Events */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEVENTS')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEVENTS), array('view', 'id'=>$data->idEVENTS)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_idUser')); ?>:</b>
	<?php echo CHtml::encode($data->USER_idUser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_guests')); ?>:</b>
	<?php echo CHtml::encode($data->max_guests); ?>
	<br />


</div>