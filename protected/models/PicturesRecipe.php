<?php

/**
 * This is the model class for table "pictures_recipe".
 *
 * The followings are the available columns in table 'pictures_recipe':
 * @property integer $idPICTURES_RECIPE
 * @property string $file_name
 * @property integer $RECIPE_idRECIPE
 *
 * The followings are the available model relations:
 * @property Recipe $rECIPEIdRECIPE
 */
class PicturesRecipe extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pictures_recipe';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file_name, RECIPE_idRECIPE', 'required'),
                        array('file_name', 'file', 'types'=>'jpg, gif,png, jped', 'on'=>'update'), 
			array('RECIPE_idRECIPE', 'numerical', 'integerOnly'=>true),
			array('file_name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPICTURES_RECIPE, file_name, RECIPE_idRECIPE', 'safe', 'on'=>'search'),
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
			'idPICTURES_RECIPE' => 'Id Pictures Recipe',
			'file_name' => 'File Name',
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

		$criteria->compare('idPICTURES_RECIPE',$this->idPICTURES_RECIPE);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('RECIPE_idRECIPE',$this->RECIPE_idRECIPE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PicturesRecipe the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
