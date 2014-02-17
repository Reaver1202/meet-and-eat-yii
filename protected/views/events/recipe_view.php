
<h1>Gaenge:</h1>

<?php foreach($course as $course): ?>
<div class="course" id="<?php echo $course->idCOURSES; ?>">

	

	<div class="Name">
		<?php 
		$recipe =$course->rECIPEIdRECIPE;
		echo $recipe->name;
		echo "<a href='http://localhost/meet-and-eat-yii/index.php?r=recipe/view&id=".$recipe->idRECIPE."'>Link zum Rezept</a>"; 
		?> 
	</div>


	

</div><!-- ingredent -->
<?php endforeach; ?>