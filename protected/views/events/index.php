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
if (Yii::app()->user->checkAccess('readEvent'))
{
	$this->menu=array(
		array('label'=>'Create Event', 'url'=>array('create'))
	);
}

// role: admin
if (Yii::app()->user->checkAccess('manageEvent'))
{
	$this->menu=array(
		array('label'=>'Create Event', 'url'=>array('create')),
		array('label'=>'Manage Events', 'url'=>array('admin')),
	);
}

?>

<h1>Events</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
