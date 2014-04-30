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
            if ($j ==0 && $j == sizeof($course)-1 ){
                echo "<td class='table_cell_label table_row_single-left'>".$course_number.". Course </td>";
                echo "<td class='table_cell_value table_row_single-right'>". CHtml::link($recipe->name, array('recipe/view', 'id'=>$recipe->idRECIPE)); "</td>";
                echo "</tr>"; 
            } else if ($j == 0){
                echo "<td class='table_cell_label table_row_top-left'>".$course_number.". Course </td>";
                echo "<td class='table_cell_value table_row_top-right'>". CHtml::link($recipe->name, array('recipe/view', 'id'=>$recipe->idRECIPE)); "</td>";
                echo "</tr>"; 
            } else if ($j == sizeof($course)-1){
                echo "<td class='table_cell_label table_row_bottom-left'>".$course_number.". Course </td>";
                echo "<td class='table_cell_value table_row_bottom-right'>". CHtml::link($recipe->name, array('recipe/view', 'id'=>$recipe->idRECIPE)); "</td>";
                echo "</tr>"; 
            } else{
                echo "<td class='table_cell_label'>".$course_number.". Course </td>";
                echo "<td class='table_cell_value'>". CHtml::link($recipe->name, array('recipe/view', 'id'=>$recipe->idRECIPE)); "</td>";
                echo "</tr>";         
            }
            $i++;
        }
        ?>      
    </table>
</div>
