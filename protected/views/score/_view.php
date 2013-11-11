<?php
/* @var $this ScoreController */
/* @var $data Score */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSCORE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSCORE), array('view', 'id'=>$data->idSCORE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_idUser')); ?>:</b>
	<?php echo CHtml::encode($data->USER_idUser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id_target')); ?>:</b>
	<?php echo CHtml::encode($data->user_id_target); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id_source')); ?>:</b>
	<?php echo CHtml::encode($data->user_id_source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />


</div>