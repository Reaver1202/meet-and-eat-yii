
<h1>Gaeste:</h1>

<?php foreach($guests as $guests): ?>
<div class="guests" id="<?php echo $guests->idGUESTS; ?>">

	

	<div class="Name">
		<?php 
		$guest =$guests->uSERIdUser;
		echo $guest->Username;
		
		?> 
	</div>


	

</div><!-- ingredent -->
<?php endforeach; ?>