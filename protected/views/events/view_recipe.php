<div class="Courses" >
    <h1>G&auml;nge:</h1>
    <?php foreach($course as $course): ?>    
    <div class="Course" id="<?php echo $course->idCOURSES; ?>">
            <?php 
            $recipe =$course->rECIPEIdRECIPE;
            echo $recipe->name;
            echo "<a href='http://localhost/meet-and-eat-yii/index.php?r=recipe/view&id=".$recipe->idRECIPE."'>Link zum Rezept</a>"; 
            ?> 
    </div>
    <?php endforeach; ?>
</div>
