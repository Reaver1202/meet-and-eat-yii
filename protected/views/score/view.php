<?php
/* @var $this ScoreController */
/* @var $model Score */

$this->breadcrumbs=array(
	'Scores'=>array('index'),
	$model->idSCORE,
);

$this->menu=array(
	array('label'=>'List Score', 'url'=>array('index')),
	array('label'=>'Create Score', 'url'=>array('create')),
	array('label'=>'Update Score', 'url'=>array('update', 'id'=>$model->idSCORE)),
	array('label'=>'Delete Score', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSCORE),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Score', 'url'=>array('admin')),
);
?>

<h1>View Score #<?php echo $model->idSCORE; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idSCORE',
		'USER_idUser',
		'user_id_target',
		'user_id_source',
		'score',
		'comment',
	),
)); ?>
