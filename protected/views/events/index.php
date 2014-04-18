<?php
/* @var $this EventsController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
//	'Events',
//);

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
<script>
    function filter(){
        
       // document.getElementById('city').value();
   var test = document.location;
   test= test.href;
test=test.split("?");
test=test[0]
        window.location=(test+"?r=events/indexFiltered&city="+document.getElementById('city').value);
        //alert(document.getElementById('city').value);
    }
    function filter_clear(){
        
       // document.getElementById('city').value();
   var test = document.location;
   test= test.href;
test=test.split("?");
test=test[0]
        window.location=(test+"?r=events/index");
        //alert(document.getElementById('city').value);
    }
</script>
Nach Stadt filtern

<input type="text" id="city"></input>
<input type="button" id="filter" value="anwenden" onclick="filter();"></input>
<input type="button" id="filter" value="alle zeigen" onclick="filter_clear();"></input>

<?php
/*
echo '<select>';
//$counter =countBySql('Select city from user');
$list_data=User::model()->findAllBySQL('Select city from user');
for($i=0; $i<3;$i++){
    echo '<option>';
    echo $list_data[$i]->city; 
    echo '</option>';
}
echo '</select>';
*/


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


?>
