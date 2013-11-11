<?php
/* @var $this GuestsController */
/* @var $model Guests */

$this->breadcrumbs=array(
	'Guests'=>array('index'),
	$model->idGUESTS=>array('view','id'=>$model->idGUESTS),
	'Update',
);

$this->menu=array(
	array('label'=>'List Guests', 'url'=>array('index')),
	array('label'=>'Create Guests', 'url'=>array('create')),
	array('label'=>'View Guests', 'url'=>array('view', 'id'=>$model->idGUESTS)),
	array('label'=>'Manage Guests', 'url'=>array('admin')),
);
?>

<h1>Update Guests <?php echo $model->idGUESTS; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>