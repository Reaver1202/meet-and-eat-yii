<?php
/* @var $this PicturesUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pictures Users',
);

$this->menu=array(
	array('label'=>'Create PicturesUser', 'url'=>array('create')),
	array('label'=>'Manage PicturesUser', 'url'=>array('admin')),
);
?>

<h1>Pictures Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
