<?php
/* @var $this PicturesRecipeController */
/* @var $model PicturesRecipe */

$this->breadcrumbs=array(
	'Pictures Recipes'=>array('index'),
	$model->idPICTURES_RECIPE=>array('view','id'=>$model->idPICTURES_RECIPE),
	'Update',
);

$this->menu=array(
	array('label'=>'List PicturesRecipe', 'url'=>array('index')),
	array('label'=>'Create PicturesRecipe', 'url'=>array('create')),
	array('label'=>'View PicturesRecipe', 'url'=>array('view', 'id'=>$model->idPICTURES_RECIPE)),
	array('label'=>'Manage PicturesRecipe', 'url'=>array('admin')),
);
?>

<h1>Update PicturesRecipe <?php echo $model->idPICTURES_RECIPE; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>