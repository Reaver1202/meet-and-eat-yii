<?php
/* @var $this PicturesRecipeController */
/* @var $model PicturesRecipe */

$this->breadcrumbs=array(
	'Pictures Recipes'=>array('index'),
	$model->idPICTURES_RECIPE,
);

$this->menu=array(
	array('label'=>'List PicturesRecipe', 'url'=>array('index')),
	array('label'=>'Create PicturesRecipe', 'url'=>array('create')),
	array('label'=>'Update PicturesRecipe', 'url'=>array('update', 'id'=>$model->idPICTURES_RECIPE)),
	array('label'=>'Delete PicturesRecipe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPICTURES_RECIPE),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PicturesRecipe', 'url'=>array('admin')),
);
?>

<h1>View PicturesRecipe #<?php echo $model->idPICTURES_RECIPE; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPICTURES_RECIPE',
		'file_name',
		'RECIPE_idRECIPE',
	),
)); ?>
