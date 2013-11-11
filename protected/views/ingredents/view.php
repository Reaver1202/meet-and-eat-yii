<?php
/* @var $this IngredentsController */
/* @var $model Ingredents */

$this->breadcrumbs=array(
	'Ingredents'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Ingredents', 'url'=>array('index')),
	array('label'=>'Create Ingredents', 'url'=>array('create')),
	array('label'=>'Update Ingredents', 'url'=>array('update', 'id'=>$model->idingredents)),
	array('label'=>'Delete Ingredents', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idingredents),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ingredents', 'url'=>array('admin')),
);
?>

<h1>View Ingredents #<?php echo $model->idingredents; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idingredents',
		'RECIPE_idRECIPE',
		'name',
		'amount',
		'amount_description',
	),
)); ?>
