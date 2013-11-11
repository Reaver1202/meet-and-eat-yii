<?php
/* @var $this CoursesController */
/* @var $data Courses */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCOURSES')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCOURSES), array('view', 'id'=>$data->idCOURSES)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_number')); ?>:</b>
	<?php echo CHtml::encode($data->course_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EVENTS_idEVENTS')); ?>:</b>
	<?php echo CHtml::encode($data->EVENTS_idEVENTS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RECIPE_idRECIPE')); ?>:</b>
	<?php echo CHtml::encode($data->RECIPE_idRECIPE); ?>
	<br />


</div>