<?php
/* @var $this SpecNamesController */
/* @var $model SpecNames */

$this->breadcrumbs=array(
	'Spec Names'=>array('index'),
	$model->name=>array('view','id'=>$model->idSPEC_NAMES),
	'Update',
);

$this->menu=array(
	array('label'=>'List SpecNames', 'url'=>array('index')),
	array('label'=>'Create SpecNames', 'url'=>array('create')),
	array('label'=>'View SpecNames', 'url'=>array('view', 'id'=>$model->idSPEC_NAMES)),
	array('label'=>'Manage SpecNames', 'url'=>array('admin')),
);
?>

<h1>Update SpecNames <?php echo $model->idSPEC_NAMES; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>