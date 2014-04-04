<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/<?php echo $this->id;?>.css" />

<div class="Guests">
    <h1>Gaeste:</h1>
    <?php foreach($guests as $guests): ?>
    <div class="Guest" id="<?php echo $guests->idGUESTS; ?>">
        <?php 
            $guest =$guests->uSERIdUser;
            echo $guest->Username;
            if($guests->approved==1){
                echo ' (freigegeben)';  
                // lade Event model mit ID
                $model=$this->loadModel($guests->EVENTS_idEVENTS);
                // check access, ob aktueller User ein Admin oder der Author des Events ist
                $params = array('events'=>$model);
                if(Yii::app()->user->checkAccess('updateOwnEvent',$params) || Yii::app()->user->checkAccess('updateEvent')){
                        // Benutzer nachträglich (nach voriger Zusage) absagen
                        echo CHtml::button('Absagen', array('class'=>'Button_event','onclick' => 'js:document.location.href="index.php?r=guests/declineGuest&id='.$guests->idGUESTS.'"')); 
                        // echo CHtml::button('Absagen', 'linkOptions'=>array('submit' => array('guests/declineGuest','id'=>$guests->idGUESTS),'confirm'=>'Are you sure you want to delete this item?'));//'js:document.location.href="index.php?r=guests/declineGuest&id='.$guests->idGUESTS.'"'))); 
                        //'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEVENTS),'confirm'=>'Are you sure you want to delete this item?')
                }
            }else{
                echo ' (freigabe erforderlich)';
                // lade Event model mit ID
                $model=$this->loadModel($guests->EVENTS_idEVENTS);
                // check access, ob aktueller User ein Admin oder der Author des Events ist
                $params = array('events'=>$model);
                if(Yii::app()->user->checkAccess('updateOwnEvent',$params) || Yii::app()->user->checkAccess('updateEvent')){
                        // Gast Zusagen / Absagen
                        echo CHtml::button('Zusagen', array('class'=>'Button_event','onclick' => 'js:document.location.href="index.php?r=guests/acceptGuest&id='.$guests->idGUESTS.'"')); 
                        echo CHtml::button('Absagen', array('class'=>'Button_event','onclick' => 'js:document.location.href="index.php?r=guests/declineGuest&id='.$guests->idGUESTS.'"',)); 
                }
            }
        ?> 
    </div>
    <?php endforeach; ?>
</div>
