<div class="Courses Div_information" >
    <h1><b>Courses</b></h1>
    <table class="table_information" id="table_recipe">
    <?php 
        $i=0;
        $course_amount = sizeof($course);
//        var_dump($course_amount);
//        var_dump($course);
        for ($j=0; $j<$course_amount; $j++){
            if ($i%2 == 0){
                echo "<tr class='table_row table_row_even' id=".$course[$j]->RECIPE_idRECIPE.">";
            } else {
                echo "<tr class='table_row table_row_odd' id=".$course[$j]->RECIPE_idRECIPE.">";
            }            
            $course_number = $i+1;
            $recipe =$course[$j]->rECIPEIdRECIPE;
            $recipe_picture = $recipe->picturesRecipes[0]->file_name;
            if ($j ==0 && $j == sizeof($course)-1 ){
                $style_left = " table_row_single-left";
                $style_right = " table_row_single-right";                
            } else if ($j == 0){
                $style_left = " table_row_top-left";
                $style_right = " table_row_top-right";
            } else if ($j == sizeof($course)-1){
                $style_left = " table_row_bottom-left";
                $style_right = " table_row_bottom-right";
            } else{
                $style_left = "";
                $style_right = "";         
            }
            echo "<td class='table_cell_label'".$style_left."'>".$course_number.". Course </td>";
            echo "<td width='100px'> ". CHtml::image(Yii::app()->getBaseUrl(true).'/pictures_recipes/'.$recipe_picture, 'DORE',array('style'=>'width: 100px')); "</td>";
            echo "<td class='table_cell_value".$style_right."'>". CHtml::link($recipe->name, array('recipe/view', 'id'=>$recipe->idRECIPE)); "</td>";
            echo "</tr>"; 
            $i++;
        }
        ?>      
    </table>
</div>
