<?php

/**
 * This is the model class for table "guests".
 *
 * The followings are the available columns in table 'guests':
 * @property integer $idGUESTS
 * @property integer $EVENTS_idEVENTS
 * @property integer $USER_idUser
 * @property integer $approved
 *
 * The followings are the available model relations:
 * @property Events $eVENTSIdEVENTS
 * @property User $uSERIdUser
 */
class Guests extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'guests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idGUESTS, EVENTS_idEVENTS, USER_idUser', 'required'),
			array('idGUESTS, EVENTS_idEVENTS, USER_idUser, approved', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idGUESTS, EVENTS_idEVENTS, USER_idUser, approved', 'safe', 'on'=>'search'),
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
			'uSERIdUser' => array(self::BELONGS_TO, 'User', 'USER_idUser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idGUESTS' => 'Id Guests',
			'EVENTS_idEVENTS' => 'Events Id Events',
			'USER_idUser' => 'User Id User',
			'approved' => 'Approved',
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

		$criteria->compare('idGUESTS',$this->idGUESTS);
		$criteria->compare('EVENTS_idEVENTS',$this->EVENTS_idEVENTS);
		$criteria->compare('USER_idUser',$this->USER_idUser);
		$criteria->compare('approved',$this->approved);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Guests the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
