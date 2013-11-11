<?php
/* @var $this PicturesUserController */
/* @var $data PicturesUser */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPICTURES_USER')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPICTURES_USER), array('view', 'id'=>$data->idPICTURES_USER)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_name')); ?>:</b>
	<?php echo CHtml::encode($data->file_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_idUser')); ?>:</b>
	<?php echo CHtml::encode($data->USER_idUser); ?>
	<br />


</div>