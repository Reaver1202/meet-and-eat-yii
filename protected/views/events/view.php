<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/<?php echo $this->id;?>.css" />


<?php
/* @var $this EventsController */
/* @var $model Events */

//$this->breadcrumbs=array(
//	'Events'=>array('index'),
//	$model->idEVENTS,
//);


// ###########################################################
// ###### Menu Column2 on the right ##########################
// ###########################################################
$params = array('events'=>$model);
// role: reader
if (Yii::app()->user->checkAccess('readEvent'))
{
	$this->menu=array(
		array('label'=>'List Events', 'url'=>array('index')),
		array('label'=>'Create Event', 'url'=>array('create'))
	);
}

// role: author
if (Yii::app()->user->checkAccess('createEvent') &&
	Yii::app()->user->checkAccess('updateOwnEvent',$params) &&
	Yii::app()->user->checkAccess('deleteOwnEvent',$params))
{
	$this->menu=array(
		array('label'=>'List Events', 'url'=>array('index')),
		array('label'=>'Create Event', 'url'=>array('create')),
		array('label'=>'Update Event', 'url'=>array('update', 'id'=>$model->idEVENTS)),
		array('label'=>'Delete Event', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEVENTS),'confirm'=>'Are you sure you want to delete this item?')),
	);
}

// role: admin
if (Yii::app()->user->checkAccess('manageEvent'))
{
	$this->menu=array(
		array('label'=>'List Events', 'url'=>array('index')),
		array('label'=>'Create Event', 'url'=>array('create')),
		array('label'=>'Update Event', 'url'=>array('update', 'id'=>$model->idEVENTS)),
		array('label'=>'Delete Event', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEVENTS),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Manage Events', 'url'=>array('admin')),
	);
}


?>

<div id="view_event">
    <?php 
//        $this->widget('zii.widgets.CDetailView', array(
//    	'data'=>$model,
//    	'attributes'=>array(
//                //'idEVENTS',
//                'date',
//                //'USER_idUser',
//                'description:html',
//                'max_guests',
//                array(
//                    'label' => 'Maximum number <br>of Guests',
//                    'value' => $model->max_guests
//                )
//    	),
//        )); 
    ?>
    <?php 
            $this->renderPartial('view_event',array(
                'post'=>$model,
                'event'=>$model,
            )); 
    ?>
</div>

<!--user_view--> 
<div id="view_user">
      <?php
//        $this->widget('zii.widgets.CDetailView', array(
//            'data'=>$model->uSERIdUser,
//            'attributes'=>array(
//                'Username',
//                'first_name',
//                'last_name',
//                'city',
//                'street',
//                'house_number',
//                'year_of_birth',
//                'score',
//            ),
//        ));
    ?>

    <?php 
        $this->renderPartial('view_user',array(
            'post'=>$model,
            'user'=>$model->uSERIdUser,
        )); 
    ?>   
</div>

<!--recipe_view-->
<div id="view_recipes">
        <?php $this->renderPartial('view_recipe',array(
            'post'=>$model,
            'course'=>$model->courses,
        )); ?>
   
</div>

<!--guests_view-->
<div id="view_guests">	
        <?php $this->renderPartial('view_guests',array(
            'post'=>$model,
            'guests'=>$model->guests,
        )); ?>
   
</div>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<!--Teilnehmen button, der guests/createManual aufruft und einen neuen Teilnehmer 
anlegt, der aber noch vom Author angenommen werden muss-->
<?php echo CHtml::button('Teilnehmen', array('class'=>'Button_event','onclick' => 'js:document.location.href="index.php?r=guests/createManual&id='.$model->idEVENTS.'"')); ?>

