<?php
/* @var $this RecipeController */
/* @var $model Recipe */

$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Recipe', 'url'=>array('index')),
	array('label'=>'Create Recipe', 'url'=>array('create')),
	array('label'=>'Update Recipe', 'url'=>array('update', 'id'=>$model->idRECIPE)),
	array('label'=>'Delete Recipe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idRECIPE),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Recipe', 'url'=>array('admin')),
);
?>

<h1>View Recipe #<?php echo $model->idRECIPE; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idRECIPE',
		'name',
		'USER_idUser',
		'manual',
		'number_of_persons',
	),
)); ?>



<div id="ingredents">
    <?php //if($model->commentCount>=1) //bereich um Zutatetn über eigenen view zu rendern : ?>
       
        <?php $this->renderPartial('ingredents_view',array(
            'post'=>$model,
            'ingredents'=>$model->ingredents,
        )); ?>
   
</div>