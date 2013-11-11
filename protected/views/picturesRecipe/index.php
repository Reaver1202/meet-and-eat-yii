<?php
/* @var $this PicturesRecipeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pictures Recipes',
);

$this->menu=array(
	array('label'=>'Create PicturesRecipe', 'url'=>array('create')),
	array('label'=>'Manage PicturesRecipe', 'url'=>array('admin')),
);
?>

<h1>Pictures Recipes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
