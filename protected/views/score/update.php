<?php
/* @var $this ScoreController */
/* @var $model Score */

$this->breadcrumbs=array(
	'Scores'=>array('index'),
	$model->idSCORE=>array('view','id'=>$model->idSCORE),
	'Update',
);

$this->menu=array(
	array('label'=>'List Score', 'url'=>array('index')),
	array('label'=>'Create Score', 'url'=>array('create')),
	array('label'=>'View Score', 'url'=>array('view', 'id'=>$model->idSCORE)),
	array('label'=>'Manage Score', 'url'=>array('admin')),
);
?>

<h1>Update Score <?php echo $model->idSCORE; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>