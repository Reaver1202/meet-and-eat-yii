<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->idEVENTS=>array('view','id'=>$model->idEVENTS),
	'Update',
);

// ###########################################################
// ###### Menu Column2 on the right ##########################
// ###########################################################
$params = array('events'=>$model);

// role: author
// reader can´t update 
if (Yii::app()->user->checkAccess('readEvent') &&
	Yii::app()->user->checkAccess('createEvent') &&
	Yii::app()->user->checkAccess('updateOwnEvent',$params) &&
	Yii::app()->user->checkAccess('deleteOwnEvent',$params))
{
	$this->menu=array(
		array('label'=>'List Events', 'url'=>array('index')),
		array('label'=>'Create Event', 'url'=>array('create')),
		array('label'=>'View Event', 'url'=>array('view', 'id'=>$model->idEVENTS)),
	);
}

// role: admin
if (Yii::app()->user->checkAccess('manageEvent'))
{
	$this->menu=array(
		array('label'=>'List Events', 'url'=>array('index')),
		array('label'=>'Create Event', 'url'=>array('create')),
		array('label'=>'View Event', 'url'=>array('view', 'id'=>$model->idEVENTS)),
		array('label'=>'Manage Events', 'url'=>array('admin')),
	);
}

?>

<h1>Update Events <?php echo $model->idEVENTS; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>