<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/<?php echo $this->id;?>.css" />
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Do you like cooking? Do you like cooking together but you live alone? <br>
    Then YOU are on the right platform: Meet and Eat!
</p>

<p>After registration you can create recipce and events to meet and eat together:
<ul class="ul_links">
    <li class="li_link"><?php echo CHtml::link('Registration', array('user/create')); ?></li>
    <li class="li_link"><?php echo CHtml::link('Browse through Events', array('events/index')); ?></li>
    <li class="li_link"><?php echo CHtml::link('Browse through Recipes', array('recipe/index')); ?></li>
</ul>
</p>


