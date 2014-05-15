<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/<?php echo $this->id;?>.css" />
<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
//alle verf�gbaren Rezepte f�r DropDown 
$_GET['RecipeList']=CHtml::listData(Recipe::model()->findAll(),'idRECIPE','name');
//var_dump($_GET['RecipeList']); 
//bisher ausgew�hlte Rezepte
//$_GET['courses']=$_GET; 
//var_dump($_GET['courses']); 

//var_dump($_GET['RecipeList']); 

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
                e.g. 2001-01-30 13:35:15           
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
	
	var recipeListObject = <?php echo json_encode($_GET['RecipeList']); ?>;
//	console.log(recipeListObject);
	var previous_course = new Array(); 	

	function initiateCourse(){
            recipeList_courses = new Array();
            recipeList_courses = <?php echo json_encode($_GET['courses_IDs']); ?>;
            console.log(recipeList_courses);

            // div bekommen
            var div_courses = document.getElementById("div_courses");
            // Anzahl Courses 
            counter_courses=Object.keys(recipeList_courses).length;  
//            var i = counter_courses; 

            for(i=0; i<counter_courses; i++){
                var current_course = i+1;
                // div + select Anfang:
                div_courses.innerHTML+='<div class="row">'
                    +current_course+'. Course: '
                    +'<select name="Courses['+i+'][idRECIPE]" id="x'+i+'">';
		
                // letztes Select Element bekommen
                select_Recipe = document.getElementById('x'+i);
//                console.log(select_Recipe);
//                select_Recipe.innerHTML+='<option value="'+j+'">'+recipeListObject[j]+'</option>';
                
                // Schleife durch die Objekte
                for(var index in recipeListObject) { 
                    // alle select-Optionen generieren
                    select_Recipe.innerHTML+='<option value="'+index+'">'+recipeListObject[index]+'</option>';
                }
                // select element schließen
                div_courses.innerHTML+='</select></div>';
                
//                for(var j=1; j<Object.keys(recipeListObject).length;j++){
//
//                        select_Recipe.innerHTML+='<option value="'+j+'">'+recipeListObject[j]+'</option>';
//
//                        if(j==Object.keys(recipeListObject).length-1)div_courses.innerHTML+='</select></div>';
//
//                }}
		}
		//console.log(recipeListObject_courses);
		for(var y=0;y<counter_courses; y++){
			document.getElementsByName("Courses["+y+"][idRECIPE]")[0].value=recipeList_courses[y]; 
		}
            
	}
	
	
	function generateNewCourse(){
            var div_courses = document.getElementById("div_courses");			
            var i = counter_courses;
    
            //console.log(document.getElementsByName("Courses[0][idRECIPE]")[0]);
            //
            // falls bisher Rezepte als Gänge beim Event angelegt wurden, soll die For-Schleife ausgeführt werden
            // Die For-Schleife  die dazu all zuvor eingetragenen Gänge in einem Array zu speichern, sodass die Werte wiederhergestellt werden
            if(typeof(document.getElementsByName("Courses[0][idRECIPE]")[0])!='undefined'){
                for(var x=0;x<=counter_courses-1; x++){
                        previous_course[x]=document.getElementsByName("Courses["+x+"][idRECIPE]")[0].value; 
                }			
            }				

            var current_course = i+1;
            // div + select Anfang:
            div_courses.innerHTML+='<div class="row">'
                +current_course+'. Course: '
                +'<select name="Courses['+i+'][idRECIPE]" id="x'+i+'">';
		
//	    console.log(recipeListObject); 
//	    
            // letztes Select Element bekommen
            select_Recipe = document.getElementById('x'+i);
            console.log(select_Recipe);
            //select_Recipe.innerHTML+='<option value="'+j+'">'+recipeListObject[j]+'</option>';

            // Schleife durch die Objekte
            for(var index in recipeListObject) { 
                // alle select-Optionen generieren
                select_Recipe.innerHTML+='<option value="'+index+'">'+recipeListObject[index]+'</option>';
            }
            // select element schließen
            div_courses.innerHTML+='</select></div>';
            
            /* alter Code
             * Probleme wegen nicht fortlaufenden ID´s
             */
//		for(var j=2; j<=Object.keys(recipeListObject).length;j++){
//			
//			select_Recipe.innerHTML+='<option value="'+j+'">'+recipeListObject[j]+'</option>';
//		
//		if(j==Object.keys(recipeListObject).length-1)div_courses.innerHTML+='</select></div>';
//		
//		}
	    
            // Anzahl der gesetzten Gänge erhöhen
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
	
	<script> initiateCourse();  </script>
	
	</div>
	</div>
	
	
	<div class="row buttons">
		<button type="button" class="Button_event" onClick="generateNewCourse()">New Course</button>
	</div>
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class"=>"Button_event")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->