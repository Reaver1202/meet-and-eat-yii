<?php
/* @var $this PicturesUserController */
/* @var $model PicturesUser */

$this->breadcrumbs=array(
	'Pictures Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PicturesUser', 'url'=>array('index')),
	array('label'=>'Manage PicturesUser', 'url'=>array('admin')),
);
?>

<h1>Create PicturesUser</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>