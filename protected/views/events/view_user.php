<div class="Author Div_information" id="<?php echo $user->idUser; ?>">
    <h1><b>Organizer</b></h1>
    <table class="table_information" id="table_user">
        <tr class="table_row table_row_even">
            <td class="table_cell_label table_row_top-left">Username:</td>
            <td class="table_cell_value table_row_top-right"><?php echo $user->Username ?></td>
        </tr>
        <tr class="table_row table_row_odd">
            <td class="table_cell_label">Full name:</td>
            <td class="table_cell_value"><?php echo $user->first_name." ".$user->last_name ?></td>
        </tr>
        <tr class="table_row table_row_even">
            <td class="table_cell_label">City:</td>
            <td class="table_cell_value"><?php echo $user->city ?></td>
        </tr>
        <tr class="table_row table_row_odd">
            <td class="table_cell_label">Adress:</td>
            <td class="table_cell_value"><?php echo $user->street." ".$user->house_number ?></td>
        </tr>
        <tr class="table_row table_row_even">
            <td class="table_cell_label">Year of Birth:</td>
            <td class="table_cell_value"><?php echo $user->year_of_birth ?></td>
        </tr>
        <tr class="table_row table_row_odd">
            <td class="table_cell_label table_row_bottom-left">Score:</td>
            <td class="table_cell_value table_row_bottom-right"><?php echo $user->score ?></td>
        </tr>
    </table>
</div>

