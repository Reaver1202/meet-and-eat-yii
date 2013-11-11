<?php

/**
 * This is the model class for table "recipe".
 *
 * The followings are the available columns in table 'recipe':
 * @property integer $idRECIPE
 * @property string $name
 * @property integer $USER_idUser
 * @property string $manual
 * @property integer $number_of_persons
 *
 * The followings are the available model relations:
 * @property Courses[] $courses
 * @property Documents[] $documents
 * @property Ingredents[] $ingredents
 * @property Pictures[] $pictures
 * @property PicturesRecipe[] $picturesRecipes
 * @property User $uSERIdUser
 * @property Specialties[] $specialties
 */
class Recipe extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'recipe';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, USER_idUser, manual, number_of_persons', 'required'),
			array('USER_idUser, number_of_persons', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('manual', 'length', 'max'=>10000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idRECIPE, name, USER_idUser, manual, number_of_persons', 'safe', 'on'=>'search'),
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
			'courses' => array(self::HAS_MANY, 'Courses', 'RECIPE_idRECIPE'),
			'documents' => array(self::HAS_MANY, 'Documents', 'RECIPE_idRECIPE'),
			'ingredents' => array(self::HAS_MANY, 'Ingredents', 'RECIPE_idRECIPE'),
			'pictures' => array(self::HAS_MANY, 'Pictures', 'RECIPE_idRECIPE'),
			'picturesRecipes' => array(self::HAS_MANY, 'PicturesRecipe', 'RECIPE_idRECIPE'),
			'uSERIdUser' => array(self::BELONGS_TO, 'User', 'USER_idUser'),
			'specialties' => array(self::HAS_MANY, 'Specialties', 'RECIPE_idRECIPE'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idRECIPE' => 'Id Recipe',
			'name' => 'Name',
			'USER_idUser' => 'User Id User',
			'manual' => 'Manual',
			'number_of_persons' => 'Number Of Persons',
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

		$criteria->compare('idRECIPE',$this->idRECIPE);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('USER_idUser',$this->USER_idUser);
		$criteria->compare('manual',$this->manual,true);
		$criteria->compare('number_of_persons',$this->number_of_persons);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Recipe the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
