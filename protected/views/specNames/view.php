<?php
/* @var $this SpecNamesController */
/* @var $model SpecNames */

$this->breadcrumbs=array(
	'Spec Names'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SpecNames', 'url'=>array('index')),
	array('label'=>'Create SpecNames', 'url'=>array('create')),
	array('label'=>'Update SpecNames', 'url'=>array('update', 'id'=>$model->idSPEC_NAMES)),
	array('label'=>'Delete SpecNames', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSPEC_NAMES),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SpecNames', 'url'=>array('admin')),
);
?>

<h1>View SpecNames #<?php echo $model->idSPEC_NAMES; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idSPEC_NAMES',
		'name',
	),
)); ?>
