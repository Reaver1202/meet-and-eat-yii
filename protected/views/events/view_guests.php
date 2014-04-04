<div class="Guests Div_information">
    <h1>Gaeste:</h1>
    <table class="table_information" id="table_guests">
    <?php 
        $i=0;
        foreach($guests as $guests): // Even or Odd Row-Number
            if ($i%2 == 0){
                echo "<tr class='table_row table_row_even' id=".$guests->idGUESTS.">";
            } else {
                echo "<tr class='table_row table_row_odd' id=".$guests->idGUESTS.">";
            }

            $guest =$guests->uSERIdUser;
    ?>    
    <td class="table_cell_label"> <?php   echo $guest->Username; ?></td>
    <?php    
        if($guests->approved==1){
            echo '<td>(freigegeben)</td>';  
            // lade Event model mit ID
            $model=$this->loadModel($guests->EVENTS_idEVENTS);
            // check access, ob aktueller User ein Admin oder der Author des Events ist
            $params = array('events'=>$model);
            if(Yii::app()->user->checkAccess('updateOwnEvent',$params) || Yii::app()->user->checkAccess('updateEvent')){
                    // Benutzer nachträglich (nach voriger Zusage) absagen
                    echo '<td></td>';
                    echo '<td class="table_cell_label">'.CHtml::button('Absagen', array('class'=>'Button_event','onclick' => 'js:document.location.href="index.php?r=guests/declineGuest&id='.$guests->idGUESTS.'"')).'</td>'; 
                    // echo CHtml::button('Absagen', 'linkOptions'=>array('submit' => array('guests/declineGuest','id'=>$guests->idGUESTS),'confirm'=>'Are you sure you want to delete this item?'));//'js:document.location.href="index.php?r=guests/declineGuest&id='.$guests->idGUESTS.'"'))); 
                    //'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEVENTS),'confirm'=>'Are you sure you want to delete this item?')
            }
        }else{
            echo '<td>(freigabe erforderlich)</td>';
            // lade Event model mit ID
            $model=$this->loadModel($guests->EVENTS_idEVENTS);
            // check access, ob aktueller User ein Admin oder der Author des Events ist
            $params = array('events'=>$model);
            if(Yii::app()->user->checkAccess('updateOwnEvent',$params) || Yii::app()->user->checkAccess('updateEvent')){
                    // Gast Zusagen / Absagen
                    echo '<td class="table_cell_label">'.CHtml::button('Zusagen', array('class'=>'Button_event','onclick' => 'js:document.location.href="index.php?r=guests/acceptGuest&id='.$guests->idGUESTS.'"')).'</td>'; 
                    echo '<td class="table_cell_label">'.CHtml::button('Absagen', array('class'=>'Button_event','onclick' => 'js:document.location.href="index.php?r=guests/declineGuest&id='.$guests->idGUESTS.'"',)).'</td>'; 
            }
        }
    ?> 
    </tr>
    
    <?php 
        $i++;
        endforeach; 
    ?>
    </table>
</div>
