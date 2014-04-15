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

Nach Stadt filtern

<?php

echo '<select>';
//$counter =countBySql('Select city from user');
$list_data=User::model()->findAllBySQL('Select city from user');
for($i=0; $i<3;$i++){
    echo '<option>';
    echo $list_data[$i]->city; 
    echo '</option>';
}
echo '</select>';

?>



<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
    'enableSorting'=>1,
    'sortableAttributes'=>array(
                        'description' => 'description',               
                        ),
    
    
	'itemView'=>'_view',
)); 

$list_data=User::model()->findAllBySQL('Select city from user');
var_dump($list_data[0]->city);
?>
