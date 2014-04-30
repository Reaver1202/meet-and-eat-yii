<div class="Guests Div_information">
    <h1><b>Guests</b></h1>
    <table class="table_information" id="table_guests">
    <?php 
        $i=0;
        $guest_amount = sizeof($guests);
//        var_dump($course_amount);
//        var_dump($course);
        for ($j=0; $j<$guest_amount; $j++){ 
            if ($i%2 == 0){ // Even or Odd Row-Number
                echo "<tr class='table_row table_row_even' id=".$guests[$j]->idGUESTS.">";
            } else {
                echo "<tr class='table_row table_row_odd' id=".$guests[$j]->idGUESTS.">";
            }

            $guest =$guests[$j]->uSERIdUser;
            if ($j ==0 && $j == sizeof($guests)-1 ){
                $left_style = " table_row_single-left";
                $right_style = " table_row_single-right";
            } else if ($j == 0){
                $left_style = " table_row_top-left";
                $right_style = " table_row_top-right";
            }   else if ($j == sizeof($guests)-1 ){
                $left_style = " table_row_bottom-left";
                $right_style = " table_row_bottom-right";
            } else {
                $left_style = "";
                $right_style = "";
            }
            echo "<td class='table_cell_label ".$left_style."'>".$guest->Username."</td>";
            
            // lade Event model mit ID
            $model=$this->loadModel($guests[$j]->EVENTS_idEVENTS);
            // check access, ob aktueller User ein Admin oder der Author des Events ist
            $params = array('events'=>$model);
            
            if($guests[$j]->approved==1){
                if(Yii::app()->user->checkAccess('updateOwnEvent',$params) || Yii::app()->user->checkAccess('updateEvent')){
                     echo '<td>(freigegeben)</td>';
                     // Benutzer nachträglich (nach voriger Zusage) absagen
                    echo '<td></td>';
                    echo '<td class="table_cell_label'.$right_style.'">'.CHtml::button('Absagen', array('class'=>'Button_event','onclick' => 'js:document.location.href="index.php?r=guests/declineGuest&id='.$guests[$j]->idGUESTS.'"')).'</td>'; 
                    // echo CHtml::button('Absagen', 'linkOptions'=>array('submit' => array('guests/declineGuest','id'=>$guests->idGUESTS),'confirm'=>'Are you sure you want to delete this item?'));//'js:document.location.href="index.php?r=guests/declineGuest&id='.$guests->idGUESTS.'"'))); 
                    //'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEVENTS),'confirm'=>'Are you sure you want to delete this item?')
                 } else {
                     echo "<td class ='".$right_style."'>(freigegeben)</td>";
                 }  
            }else{
                 if(Yii::app()->user->checkAccess('updateOwnEvent',$params) || Yii::app()->user->checkAccess('updateEvent')){
                    echo '<td>(freigabe erforderlich)</td>';
                    // Gast Zusagen / Absagen
                    echo '<td class="table_cell_label">'.CHtml::button('Zusagen', array('class'=>'Button_event','onclick' => 'js:document.location.href="index.php?r=guests/acceptGuest&id='.$guests[$j]->idGUESTS.'"')).'</td>'; 
                    echo '<td class="table_cell_label'.$right_style.'">'.CHtml::button('Absagen', array('class'=>'Button_event','onclick' => 'js:document.location.href="index.php?r=guests/declineGuest&id='.$guests[$j]->idGUESTS.'"',)).'</td>';   
                 } else {
                     echo "<td class ='".$right_style."'>(freigabe erforderlich)</td>";
                 }
        }
            echo "</tr>";
        }
    ?> 
    
    </table>
</div>
