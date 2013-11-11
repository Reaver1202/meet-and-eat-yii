<?php
/* @var $this SpecNamesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spec Names',
);

$this->menu=array(
	array('label'=>'Create SpecNames', 'url'=>array('create')),
	array('label'=>'Manage SpecNames', 'url'=>array('admin')),
);
?>

<h1>Spec Names</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
