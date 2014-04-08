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
        'htmlOptions'=>array(
                'enctype'=>'multipart/form-data'),
        
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
	
<!-- Input felder f�r die Zutat, welche in ihre eigene Tabelle soll -->

<div class="row" id='picturesrecipe'>
			<?php  echo $form->labelEx($model_picturesrecipe,'file_name'); ?>
			<?php  echo CHtml::activeFileField($model_picturesrecipe, 'file_name'); ?>
			<?php  echo $form->error($model_picturesrecipe,'file_name'); ?>
		</div>
	

	<div id="div_ingredents">
	<!--
		<div class="row">
			<?php // echo $form->labelEx($model_ingredents,'RECIPE_idRECIPE'); ?>
			<?php // echo $form->textField($model_ingredents,'RECIPE_idRECIPE'); ?>
			<?php //echo $form->error($model_ingredents,'RECIPE_idRECIPE'); ?>
		</div>
		<div class="row">
			<?php //echo $form->labelEx($model_ingredents,'name'); ?>
			<?php // echo $form->textField($model_ingredents,'name'); ?>
			<?php //echo $form->error($model_ingredents,'name'); ?>
		</div>
		<div class="row">
			<?php //echo $form->labelEx($model_ingredents,'amount'); ?>
			<?php //echo $form->textField($model_ingredents,'amount'); ?>
			<?php //echo $form->error($model_ingredents,'amount'); ?>
		</div>
		<div class="row">
			<?php //echo $form->labelEx($model_ingredents,'amount_description'); ?>
			<?php //echo $form->textField($model_ingredents,'amount_description'); ?>
			<?php //echo $form->error($model_ingredents,'amount_description'); ?>
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
		var previous_input_name = new Array(); 
		var previous_input_amount = new Array(); 
		var previous_input_amount_des = new Array(); 
		
		function generateNewIngredent(){
		//	console.log(document.getElementsByName("Ingredents[0][amount_description]"));
		
		//save previous inputs
		for(var x=0; x<=counter_ingredents; x++){
		previous_input_name[x]=document.getElementsByName("Ingredents["+x+"][name]")[0].value; 
		previous_input_amount[x]=document.getElementsByName("Ingredents["+x+"][amount]")[0].value; 
		previous_input_amount_des[x]=document.getElementsByName("Ingredents["+x+"][amount_description]")[0].value; 
		//console.log(previous_input[x]); 
		//console.log(counter_ingredents); 
	//	var_dump(previous_input[x]); 
		}
		
		
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
		
		
		
		//save previous inputs
		//for(var x=0; x<counter_ingredents; x++){
		//previous_input[x]=document.getElementsByName("Ingredents["+x+"][amount_description]")[0].Value; 
		//console.log(previous_input[x]); 
	//	console.log(counter_ingredents); 
	//	var_dump(previous_input[x]); 
	//	}
		//   < weil counter vorher erh�t wird ( nach dem speichern ) 
for(var y=0; y<counter_ingredents; y++){
		document.getElementsByName("Ingredents["+y+"][name]")[0].value=previous_input_name[y]; 
		document.getElementsByName("Ingredents["+y+"][amount]")[0].value=previous_input_amount[y]; 
		document.getElementsByName("Ingredents["+y+"][amount_description]")[0].value=previous_input_amount_des[y]; 

		}		
			
		//document.getElementsByName("Ingredents[0][amount_description]")[0].Value='test'; 
		
		//document.getElementsByName("Ingredents[0][amount_description]").setValue("test"); 
	//	console.log(document.getElementsByName("Ingredents[0][amount_description]")); 
		}
	</script>
	<div class="row buttons">
		<button type="button" onClick="generateNewIngredent()">New Ingredent</button>
	</div>

<!--nur ein test f�r die mehrfache eingabe von zutaten -->







	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>


	
	
	
	
	
	
<?php $this->endWidget(); ?>

</div><!-- form -->



<!-- beginnn der Form-inputs, mit listenfunktion um direkt mehrere tutaten einzugeben  f�r die Zutaten  http://www.yiiframework.com/doc/guide/1.1/en/form.table-->	
