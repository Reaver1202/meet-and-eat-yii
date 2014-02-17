<?php

/**
 * This is the model class for table "events".
 *
 * The followings are the available columns in table 'events':
 * @property integer $idEVENTS
 * @property string $date
 * @property integer $USER_idUser
 * @property string $description
 * @property integer $max_guests
 *
 * The followings are the available model relations:
 * @property Courses[] $courses
 * @property User $uSERIdUser
 * @property Guests[] $guests
 * @property Specialties[] $specialties
 */
class Events extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date', 'required'),
			array('USER_idUser, max_guests', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEVENTS, date, USER_idUser, description, max_guests', 'safe', 'on'=>'search'),
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
			'courses' => array(self::HAS_MANY, 'Courses', 'EVENTS_idEVENTS'),
			'uSERIdUser' => array(self::BELONGS_TO, 'User', 'USER_idUser'),
			'guests' => array(self::HAS_MANY, 'Guests', 'EVENTS_idEVENTS'),
			'specialties' => array(self::HAS_MANY, 'Specialties', 'EVENTS_idEVENTS'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEVENTS' => 'Id Events',
			'date' => 'Date',
			'USER_idUser' => 'User Id User',
			'description' => 'Description',
			'max_guests' => 'Max Guests',
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

		$criteria->compare('idEVENTS',$this->idEVENTS);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('USER_idUser',$this->USER_idUser);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('max_guests',$this->max_guests);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave() {
    //methode zum setzen des Benutzernames
  
            # set time on creating posts
            $this->USER_idUser=Yii::app()->user->getId();
            
        
        return true;
    }
    
public function getRecipeOptions(){
$recipeArray= CHTML::listData( Recipe::model()->findBySql("SELECT idRECIPE FROM Recipe") , 'idRECIPE', 'name');
return $recipeArray; 
}
	
	
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Events the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
