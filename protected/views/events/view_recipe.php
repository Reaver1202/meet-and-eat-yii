<div class="Courses Div_information" >
    <h1>G&auml;nge:</h1>
    <table class="table_information" id="table_recipe">
    <?php 
        $i=0;
        foreach($course as $course): 
            // Even or Odd Row-Number
            if ($i%2 == 0){
                echo "<tr class='table_row table_row_even' id=".$course->RECIPE_idRECIPE.">";
            } else {
                echo "<tr class='table_row table_row_odd' id=".$course->RECIPE_idRECIPE.">";
            }
    ?>    
            <td class="table_cell_label"> <?php $course_numer = $i+1; echo $course_numer.'. Course'; ?> </td>
            <?php $recipe =$course->rECIPEIdRECIPE; ?>
            <td class="table_cell_value"><?php echo CHtml::link($recipe->name, array('recipe/view', 'id'=>$recipe->idRECIPE)); ?></td>
                        
        </tr>
        
    
    <?php 
        $i++;
        endforeach; 
    ?>
    </table>
</div>
