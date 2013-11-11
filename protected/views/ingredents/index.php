<?php
/* @var $this IngredentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ingredents',
);

$this->menu=array(
	array('label'=>'Create Ingredents', 'url'=>array('create')),
	array('label'=>'Manage Ingredents', 'url'=>array('admin')),
);
?>

<h1>Ingredents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
