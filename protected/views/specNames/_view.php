<?php
/* @var $this SpecNamesController */
/* @var $data SpecNames */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSPEC_NAMES')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSPEC_NAMES), array('view', 'id'=>$data->idSPEC_NAMES)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>