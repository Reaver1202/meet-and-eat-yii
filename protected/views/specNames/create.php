<?php
/* @var $this SpecNamesController */
/* @var $model SpecNames */

$this->breadcrumbs=array(
	'Spec Names'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SpecNames', 'url'=>array('index')),
	array('label'=>'Manage SpecNames', 'url'=>array('admin')),
);
?>

<h1>Create SpecNames</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>