<?php

/**
 * This is the model class for table "courses".
 *
 * The followings are the available columns in table 'courses':
 * @property integer $idCOURSES
 * @property string $course_number
 * @property integer $EVENTS_idEVENTS
 * @property integer $RECIPE_idRECIPE
 *
 * The followings are the available model relations:
 * @property Events $eVENTSIdEVENTS
 * @property Recipe $rECIPEIdRECIPE
 */
class Courses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'courses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EVENTS_idEVENTS, RECIPE_idRECIPE', 'required'),
			array('EVENTS_idEVENTS, RECIPE_idRECIPE', 'numerical', 'integerOnly'=>true),
			array('course_number', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCOURSES, course_number, EVENTS_idEVENTS, RECIPE_idRECIPE', 'safe', 'on'=>'search'),
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
			'eVENTSIdEVENTS' => array(self::BELONGS_TO, 'Events', 'EVENTS_idEVENTS'),
			'rECIPEIdRECIPE' => array(self::BELONGS_TO, 'Recipe', 'RECIPE_idRECIPE'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCOURSES' => 'Id Courses',
			'course_number' => 'Course Number',
			'EVENTS_idEVENTS' => 'Events Id Events',
			'RECIPE_idRECIPE' => 'Recipe Id Recipe',
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

		$criteria->compare('idCOURSES',$this->idCOURSES);
		$criteria->compare('course_number',$this->course_number,true);
		$criteria->compare('EVENTS_idEVENTS',$this->EVENTS_idEVENTS);
		$criteria->compare('RECIPE_idRECIPE',$this->RECIPE_idRECIPE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Courses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
