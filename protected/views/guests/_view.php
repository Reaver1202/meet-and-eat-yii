<?php
/* @var $this GuestsController */
/* @var $data Guests */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idGUESTS')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idGUESTS), array('view', 'id'=>$data->idGUESTS)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EVENTS_idEVENTS')); ?>:</b>
	<?php echo CHtml::encode($data->EVENTS_idEVENTS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_idUser')); ?>:</b>
	<?php echo CHtml::encode($data->USER_idUser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approved')); ?>:</b>
	<?php echo CHtml::encode($data->approved); ?>
	<br />


</div>