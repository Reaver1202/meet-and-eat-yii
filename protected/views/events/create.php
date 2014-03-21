<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Create',
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

<h1>Create Events</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model_courses'=>$model_courses)); ?>