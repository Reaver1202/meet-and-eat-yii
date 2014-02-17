<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->idEVENTS,
);

$this->menu=array(
	array('label'=>'List Events', 'url'=>array('index')),
	array('label'=>'Create Events', 'url'=>array('create')),
	array('label'=>'Update Events', 'url'=>array('update', 'id'=>$model->idEVENTS)),
	array('label'=>'Delete Events', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEVENTS),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Events', 'url'=>array('admin')),
);
?>

<h1>View Events #<?php echo $model->idEVENTS; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEVENTS',
		'date',
		'USER_idUser',
		'description',
		'max_guests',
	),
)); ?>

<div id="user">
    <?php 
		
	?>
       
        <?php $this->renderPartial('user_view',array(
            'post'=>$model,
            'user'=>$model->uSERIdUser,
        )); ?>
   
</div>

<div id="recipe">
    <?php 
		//$course_tbl = $model->courses;
		//foreach $course_tbl
		//echo $course_tbl->idCOURSES;
		
		//$test=Recipe::model()->findBySql("SELECT * FROM Recipe WHERE idRecipe = ".course_tbl->RECIPE_idRECIPE.";");
		//echo $test;
	?>
		
		
        <?php $this->renderPartial('recipe_view',array(
            'post'=>$model,
            'course'=>$model->courses,
        )); ?>
   
</div>
<div id="guests">
    
		
		
        <?php $this->renderPartial('guests_view',array(
            'post'=>$model,
            'guests'=>$model->guests,
        )); ?>
   
</div>

<?php echo CHtml::button('Teilnehmen', array('onclick' => 'js:document.location.href="index.php?r=guests/createManual&id='.$model->idEVENTS.'"')); ?>

