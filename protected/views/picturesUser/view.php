<?php
/* @var $this PicturesUserController */
/* @var $model PicturesUser */

$this->breadcrumbs=array(
	'Pictures Users'=>array('index'),
	$model->idPICTURES_USER,
);

$this->menu=array(
	array('label'=>'List PicturesUser', 'url'=>array('index')),
	array('label'=>'Create PicturesUser', 'url'=>array('create')),
	array('label'=>'Update PicturesUser', 'url'=>array('update', 'id'=>$model->idPICTURES_USER)),
	array('label'=>'Delete PicturesUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPICTURES_USER),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PicturesUser', 'url'=>array('admin')),
);
?>

<h1>View PicturesUser #<?php echo $model->idPICTURES_USER; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPICTURES_USER',
		'file_name',
		'USER_idUser',
	),
)); ?>
