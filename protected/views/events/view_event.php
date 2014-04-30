<div class="Event Div_information" id="<?php echo $event->idEVENTS; ?>">
    <h1><b>Meeting</b></h1>
    <table class="table_information" id="table_event">
        <tr class="table_row table_row_even">
            <td class="table_cell_label  table_row_top-left">Date of the Event:</td>
            <td class="table_cell_value table_row_top-right"><?php echo date("d.m.Y",strtotime($event->date)) ?> at <?php  echo date("H:i",strtotime($event->date)); ?> o´clock</td>
        </tr>
        <tr class="table_row table_row_odd">
            <td class="table_cell_label">Description:</td>
            <td class="table_cell_value"><?php echo $event->description ?></td>
        </tr>
        <tr class="table_row table_row_even">
            <td class="table_cell_label table_row_bottom-left">Number of Guests:</td>
            <td class="table_cell_value table_row_bottom-right"><?php echo $event->max_guests ?></td>
        </tr>
    </table>
</div>

