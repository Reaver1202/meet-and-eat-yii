<div class="Event Div_information" id="<?php echo $event->idEVENTS; ?>">
    <h1>Meet-and-Eat Event organized by <?php echo $event->uSERIdUser->Username; ?></h1>
    <table class="table_information" id="table_event">
        <tr class="table_row table_row_even">
            <td class="table_cell_label">Date of the Event:</td>
            <td class="table_cell_value"><?php echo $event->date ?></td>
        </tr>
        <tr class="table_row table_row_odd">
            <td class="table_cell_label">Description:</td>
            <td class="table_cell_value"><?php echo $event->description ?></td>
        </tr>
        <tr class="table_row table_row_even">
            <td class="table_cell_label">Maximum number of Guests:</td>
            <td class="table_cell_value"><?php echo $event->max_guests ?></td>
        </tr>
    </table>
</div>

