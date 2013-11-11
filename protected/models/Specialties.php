<?php

/**
 * This is the model class for table "specialties".
 *
 * The followings are the available columns in table 'specialties':
 * @property integer $idtable1
 * @property integer $RECIPE_idRECIPE
 * @property integer $SPEC_NAMES_idSPEC_NAMES
 * @property integer $EVENTS_idEVENTS
 *
 * The followings are the available model relations:
 * @property Recipe $rECIPEIdRECIPE
 * @property SpecNames $sPECNAMESIdSPECNAMES
 * @property Events $eVENTSIdEVENTS
 */
class Specialties extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'specialties';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RECIPE_idRECIPE, SPEC_NAMES_idSPEC_NAMES, EVENTS_idEVENTS', 'required'),
			array('RECIPE_idRECIPE, SPEC_NAMES_idSPEC_NAMES, EVENTS_idEVENTS', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idtable1, RECIPE_idRECIPE, SPEC_NAMES_idSPEC_NAMES, EVENTS_idEVENTS', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'rECIPEIdRECIPE' => array(self::BELONGS_TO, 'Recipe', 'RECIPE_idRECIPE'),
			'sPECNAMESIdSPECNAMES' => array(self::BELONGS_TO, 'SpecNames', 'SPEC_NAMES_idSPEC_NAMES'),
			'eVENTSIdEVENTS' => array(self::BELONGS_TO, 'Events', 'EVENTS_idEVENTS'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtable1' => 'Idtable1',
			'RECIPE_idRECIPE' => 'Recipe Id Recipe',
			'SPEC_NAMES_idSPEC_NAMES' => 'Spec Names Id Spec Names',
			'EVENTS_idEVENTS' => 'Events Id Events',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idtable1',$this->idtable1);
		$criteria->compare('RECIPE_idRECIPE',$this->RECIPE_idRECIPE);
		$criteria->compare('SPEC_NAMES_idSPEC_NAMES',$this->SPEC_NAMES_idSPEC_NAMES);
		$criteria->compare('EVENTS_idEVENTS',$this->EVENTS_idEVENTS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Specialties the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
