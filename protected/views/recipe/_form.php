<?php
/* @var $this RecipeController */
/* @var $model Recipe */
/* @var $model_ingredents Ingredents */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recipe-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model,$model_ingredents); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'manual'); ?>
		<?php echo $form->textField($model,'manual',array('size'=>60,'maxlength'=>10000)); ?>
		<?php echo $form->error($model,'manual'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number_of_persons'); ?>
		<?php echo $form->textField($model,'number_of_persons'); ?>
		<?php echo $form->error($model,'number_of_persons'); ?>
	</div>
	
<!-- Input felder für die Zutat, welche in ihre eigene Tabelle soll -->

	

	<div id="div_ingredents">
	<!--
		<div class="row">
			<?php echo $form->labelEx($model_ingredents,'RECIPE_idRECIPE'); ?>
			<?php echo $form->textField($model_ingredents,'RECIPE_idRECIPE'); ?>
			<?php echo $form->error($model_ingredents,'RECIPE_idRECIPE'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model_ingredents,'name'); ?>
			<?php echo $form->textField($model_ingredents,'name'); ?>
			<?php echo $form->error($model_ingredents,'name'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model_ingredents,'amount'); ?>
			<?php echo $form->textField($model_ingredents,'amount'); ?>
			<?php echo $form->error($model_ingredents,'amount'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model_ingredents,'amount_description'); ?>
			<?php echo $form->textField($model_ingredents,'amount_description'); ?>
			<?php echo $form->error($model_ingredents,'amount_description'); ?>
		</div>
	-->

		<div class="row">
			Ingredent: <input type="text" name="Ingredents[0][name]">
		</div>	
		<div class="row">
			amount: <input type="text" name="Ingredents[0][amount]">
		</div>	
		<div class="row">
			amount_description: <input type="text" name="Ingredents[0][amount_description]">
		</div>
	</div>

	<script>
		var counter_ingredents=0;

		function generateNewIngredent(){
			var div_ingredents = document.getElementById("div_ingredents");
			counter_ingredents++;
			var i = counter_ingredents;

	/* DOM Manipulation einbauen, sodass die Inhalte von bisher 
		erzeugten Input-Feldern erhalten bleibt.
		Momentan wird das Div neu geschrieben.
	*/ 
			div_ingredents.innerHTML+= 
				
		/*+'<div class="row">'
			+'<?php echo CHtml::label("Name", false); ?>'
			+'<?php echo CHtml::textField("Ingredents['+i+'][\'name\']"); ?>'
		+'</div>'
		+'<div class="row">'
			+'<?php echo CHtml::label('Name', false); ?>'
			+'<?php echo CHtml::textField('Ingredents[][\'name\']'); ?>'
		+'</div>'
		*/
		'<div class="row">'
		+'Ingredent: <input type="text" name="Ingredents['+i+'][name]">'
		+'amount: <input type="text" name="Ingredents['+i+'][amount]">'
		+'amount_description: <input type="text" name="Ingredents['+i+'][amount_description]">'
		+'</div>';

			
		}
	</script>
	<div class="row buttons">
		<button type="button" onClick="generateNewIngredent()">New Ingredent</button>
	</div>

<!--nur ein test für die mehrfache eingabe von zutaten -->







	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>


	
	
	
	
	
	
<?php $this->endWidget(); ?>

</div><!-- form -->



<!-- beginnn der Form-inputs, mit listenfunktion um direkt mehrere tutaten einzugeben  für die Zutaten  http://www.yiiframework.com/doc/guide/1.1/en/form.table-->	
