<?php

/**
 * This is the model class for table "pictures_user".
 *
 * The followings are the available columns in table 'pictures_user':
 * @property integer $idPICTURES_USER
 * @property string $file_name
 * @property integer $USER_idUser
 *
 * The followings are the available model relations:
 * @property User $uSERIdUser
 */
class PicturesUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pictures_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('USER_idUser', 'required'),
			array('USER_idUser', 'numerical', 'integerOnly'=>true),
			array('file_name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPICTURES_USER, file_name, USER_idUser', 'safe', 'on'=>'search'),
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
			'uSERIdUser' => array(self::BELONGS_TO, 'User', 'USER_idUser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPICTURES_USER' => 'Id Pictures User',
			'file_name' => 'File Name',
			'USER_idUser' => 'User Id User',
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

		$criteria->compare('idPICTURES_USER',$this->idPICTURES_USER);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('USER_idUser',$this->USER_idUser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PicturesUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
