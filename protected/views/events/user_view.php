<h1>Veranstalter:</h1>


<div class="user" id="<?php echo $user->idUser; ?>">

	

	<div class="user">
		<?php echo "Nutzername: ".$user->Username."<br>";
		echo $user->first_name." ".$user->last_name."<br>";
		echo "Wohnort: ".$user->city."<br>";
		
		echo "Adresse: ".$user->street;
echo " ".$user->house_number."<br>";	
echo "Jahrgang: ".$user->year_of_birth."<br>";
echo "Bewertung: ".$user->score;	?> 

	</div>


	

</div><!-- ingredent -->
