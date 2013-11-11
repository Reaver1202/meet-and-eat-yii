<?php
/* @var $this IngredentsController */
/* @var $model Ingredents */

$this->breadcrumbs=array(
	'Ingredents'=>array('index'),
	$model->name=>array('view','id'=>$model->idingredents),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ingredents', 'url'=>array('index')),
	array('label'=>'Create Ingredents', 'url'=>array('create')),
	array('label'=>'View Ingredents', 'url'=>array('view', 'id'=>$model->idingredents)),
	array('label'=>'Manage Ingredents', 'url'=>array('admin')),
);
?>

<h1>Update Ingredents <?php echo $model->idingredents; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>