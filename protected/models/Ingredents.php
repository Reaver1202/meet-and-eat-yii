<?php

/**
 * This is the model class for table "ingredents".
 *
 * The followings are the available columns in table 'ingredents':
 * @property integer $idingredents
 * @property integer $RECIPE_idRECIPE
 * @property string $name
 * @property double $amount
 * @property string $amount_description
 *
 * The followings are the available model relations:
 * @property Recipe $rECIPEIdRECIPE
 */
class Ingredents extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ingredents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RECIPE_idRECIPE, name, amount, amount_description', 'required'),
			array('RECIPE_idRECIPE', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('name, amount_description', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idingredents, RECIPE_idRECIPE, name, amount, amount_description', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idingredents' => 'Idingredents',
			'RECIPE_idRECIPE' => 'Recipe Id Recipe',
			'name' => 'Name',
			'amount' => 'Amount',
			'amount_description' => 'Amount Description',
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

		$criteria->compare('idingredents',$this->idingredents);
		$criteria->compare('RECIPE_idRECIPE',$this->RECIPE_idRECIPE);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('amount_description',$this->amount_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ingredents the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
