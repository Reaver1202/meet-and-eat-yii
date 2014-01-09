<!-- eigener Zutatenview, stellt nur nacheinander die Zutaten dar-->


<h1>Zutatenliste:</h1>

<?php foreach($ingredents as $ingredent): ?>
<div class="ingredent" id="c<?php echo $ingredent->idingredents; ?>">

	

	<div class="Name">
		<?php echo $ingredent->amount;
		echo $ingredent->amount_description;
echo " ".$ingredent->name;		?> 
	</div>


	

</div><!-- ingredent -->
<?php endforeach; ?>