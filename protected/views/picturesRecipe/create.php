<?php
/* @var $this PicturesRecipeController */
/* @var $model PicturesRecipe */

$this->breadcrumbs=array(
	'Pictures Recipes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PicturesRecipe', 'url'=>array('index')),
	array('label'=>'Manage PicturesRecipe', 'url'=>array('admin')),
);
?>

<h1>Create PicturesRecipe</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>