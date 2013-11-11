<?php
/* @var $this IngredentsController */
/* @var $model Ingredents */

$this->breadcrumbs=array(
	'Ingredents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ingredents', 'url'=>array('index')),
	array('label'=>'Manage Ingredents', 'url'=>array('admin')),
);
?>

<h1>Create Ingredents</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>