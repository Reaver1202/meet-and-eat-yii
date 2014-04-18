<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->idUser,
);

$params = array('user'=>$model);
// role: author
if (Yii::app()->user->checkAccess('readOwnUser',$params) &&
        Yii::app()->user->checkAccess('updateOwnUser',$params) &&
	Yii::app()->user->checkAccess('deleteOwnUser',$params))
{
    $this->menu=array(
	array('label'=>'Update Account Information', 'url'=>array('update', 'id'=>$model->idUser)),
	array('label'=>'Delete Your Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idUser),'confirm'=>'Are you sure you want to delete this item?')),
    );
}
// role: admin
if (Yii::app()->user->checkAccess('manageUser'))
{
	$this->menu=array(
		array('label'=>'List Users', 'url'=>array('index')),
		array('label'=>'Create User', 'url'=>array('create')),
		array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->idUser)),
		array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idUser),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Manage Users', 'url'=>array('admin')),
	);
}
?>

<h1>View User #<?php echo $model->idUser; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idUser',
		'Username',
		'first_name',
		'last_name',
		'EMail',
		'year_of_birth',
		'street',
		'house_number',
		'postcode',
		'city',
		'personal_description',
		'signup_date',
		'score',
		'score_counter',
		'password',
		'role',
	),
)); ?>
