<div class="Event" id="<?php echo $event->idEVENTS; ?>">
    <h1>Event by <?php echo $event->uSERIdUser->Username; ?></h1>
    <?php 
        echo "Date of the Event: ".$event->date."<br>";
        echo "Description: ".$event->description."<br>";
        echo "Maximum number of Guests: ".$event->max_guests;
    ?> 
</div>

