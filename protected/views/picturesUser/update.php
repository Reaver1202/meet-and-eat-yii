<?php
/* @var $this PicturesUserController */
/* @var $model PicturesUser */

$this->breadcrumbs=array(
	'Pictures Users'=>array('index'),
	$model->idPICTURES_USER=>array('view','id'=>$model->idPICTURES_USER),
	'Update',
);

$this->menu=array(
	array('label'=>'List PicturesUser', 'url'=>array('index')),
	array('label'=>'Create PicturesUser', 'url'=>array('create')),
	array('label'=>'View PicturesUser', 'url'=>array('view', 'id'=>$model->idPICTURES_USER)),
	array('label'=>'Manage PicturesUser', 'url'=>array('admin')),
);
?>

<h1>Update PicturesUser <?php echo $model->idPICTURES_USER; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>