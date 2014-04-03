<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
$_GET['test']=CHtml::listData(Recipe::model()->findAll(),'idRECIPE','name');
//var_dump($_GET['test']); 

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_guests'); ?>
		<?php echo $form->textField($model,'max_guests'); ?>
		<?php echo $form->error($model,'max_guests'); ?>
	</div>

	
	<script>
		
	var counter_courses=0;
	
	var js_array = <?php echo json_encode($_GET['test']); ?>;
	var previous_course = new Array(); 
	
	
	function generateNewCourse(){
	var div_courses = document.getElementById("div_courses");
			
			var i = counter_courses;
			//alert(js_array[4]);
    
	console.log(document.getElementsByName("Courses[0][idRECIPE]")[0]);
        // falls bisher Rezepte als Gänge beim Event angelegt wurden, soll die For-Schleife ausgeführt werden
	// Die For-Schleife  die dazu all zuvor eingetragenen Gänge in einem Array zu speichern, sodass die Werte wiederhergestellt werden
	if(typeof(document.getElementsByName("Courses[0][idRECIPE]")[0])!='undefined'){
	
		for(var x=0;x<=counter_courses-1; x++){
			previous_course[x]=document.getElementsByName("Courses["+x+"][idRECIPE]")[0].value; 
		}
			
	}		
			
	/* DOM Manipulation einbauen, sodass die Inhalte von bisher 
		erzeugten Input-Feldern erhalten bleibt.
		Momentan wird das Div neu geschrieben.
	*/ 
                var current_course = i+1;
		div_courses.innerHTML+='<div class="row">'
		+current_course+'. Gang: '
		+'<select name="Courses['+i+'][idRECIPE]" id="x'+i+'">';
		
	    console.log(js_array); 
		var j=1; 
		select_Recipe = document.getElementById('x'+i);
		console.log(select_Recipe);
		select_Recipe.innerHTML+='<option value="'+j+'">'+js_array[j]+'</option>';
	
		for(var j=1; j<Object.keys(js_array).length;j++){
			
			select_Recipe.innerHTML+='<option value="'+j+'">'+js_array[j]+'</option>';
		
		if(j==Object.keys(js_array).length-1)div_courses.innerHTML+='</select></div>';
		
		}
			
		
			
			
		counter_courses++;	
		
		
	if(previous_course[0]){
	
		for(var y=0;y<counter_courses; y++){
			document.getElementsByName("Courses["+y+"][idRECIPE]")[0].value=previous_course[y]; 
		}
			
	}	
		
		
		
		
	}
	
	
	</script>
	
	<div id="div_courses">
	<div class="row">
	<?php 
		//print_r(CHtml::listData(Recipe::model()->findAll(),'idRECIPE','name'));
		//echo $form->labelEx($model_course,'RECIPE_idRECIPE'); 
		
		//echo $form->dropDownList($model_course,'RECIPE_idRECIPE',CHtml::listData(Recipe::model()->findAll(),'idRECIPE','name'));
		
		//echo $form->error($model_course,'RECIPE_idRECIPE');
	?>
	
	<script>generateNewCourse(); </script>
	
	</div>
	</div>
	
	
	<div class="row buttons">
		<button type="button" onClick="generateNewCourse()">New Course</button>
	</div>
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->