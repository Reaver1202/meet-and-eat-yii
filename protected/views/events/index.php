<?php
/* @var $this EventsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Events',
);

// ###########################################################
// ###### Menu Column2 on the right ##########################
// ###########################################################

// role: reader or author
if (Yii::app()->user->checkAccess('createEvent'))
{
	$this->menu=array(
		array('label'=>'Create Events', 'url'=>array('create'))
	);
}

// role: admin
if (Yii::app()->user->checkAccess('createEvent') &&
	Yii::app()->user->checkAccess('manageEvent'))
{
	$this->menu=array(
		array('label'=>'Create Events', 'url'=>array('create')),
		array('label'=>'Manage Events', 'url'=>array('admin')),
	);
}

?>

<h1>Events</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
