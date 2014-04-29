<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/<?php echo $this->id;?>.css" />
<?php
/* @var $this EventsController */
/* @var $data Events */
?>

<div class="view">
    <table class="table_information">
        <tr>
            <th class ="table_event_head" colspan="2">
                <b><?php 
                    $event_author =User::model()->findByPk($data->USER_idUser); 
                    $event_username = $event_author->Username;
                    $event_city = $event_author->city;
                    echo CHtml::link($event_username."'s Event in ".$event_city, array('view', 'id'=>$data->idEVENTS)); 
                ?></b>
            </th>
        </tr>
        <tr class="table_row table_row_even">
            <td width="20%">
                <b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
            </td>
            <td>
                <?php echo CHtml::encode(date("d.m.Y",strtotime($data->date))); ?>
            </td>
        </tr>
        <tr class="table_row table_row_odd">
            <td>
                <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
            </td>
            <td>
                <?php echo CHtml::encode($data->description); ?>
            </td>
        </tr>
        <tr class="table_row table_row_even">
            <td>
                <b><?php echo CHtml::encode($data->getAttributeLabel('max_guests')); ?>:</b>
            </td>
            <td>
                <?php echo CHtml::encode($data->max_guests); ?>
            </td>
        </tr>
    </table>
</div>