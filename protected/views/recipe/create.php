<?php
/* @var $this RecipeController */
/* @var $model Recipe */

$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Recipe', 'url'=>array('index')),
	array('label'=>'Manage Recipe', 'url'=>array('admin')),
);
?>

<h1>Create Recipe</h1>
<!--rendern des 2ten modells -->
<?php $this->renderPartial('_form', array('model'=>$model, 'model_ingredents'=>$model_ingredents,'model_picturesrecipe'=>$model_picturesrecipe)); ?>