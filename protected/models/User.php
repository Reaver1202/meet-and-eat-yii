<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $idUser
 * @property string $Username
 * @property string $first_name
 * @property string $last_name
 * @property string $EMail
 * @property string $year_of_birth
 * @property string $street
 * @property string $house_number
 * @property string $postcode
 * @property string $city
 * @property string $personal_description
 * @property string $signup_date
 * @property integer $score
 * @property integer $score_counter
 * @property string $password
 * @property integer $role
 *
 * The followings are the available model relations:
 * @property Events[] $events
 * @property Guests[] $guests
 * @property PicturesUser[] $picturesUsers
 * @property Recipe[] $recipes
 * @property Score[] $scores
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUser, Username, first_name, last_name, EMail, city, signup_date, password', 'required'),
			array('idUser, score, score_counter, role', 'numerical', 'integerOnly'=>true),
			array('Username, first_name, last_name, EMail, city, password', 'length', 'max'=>45),
			array('year_of_birth', 'length', 'max'=>4),
			array('street', 'length', 'max'=>50),
			array('house_number', 'length', 'max'=>10),
			array('postcode', 'length', 'max'=>5),
			array('personal_description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUser, Username, first_name, last_name, EMail, year_of_birth, street, house_number, postcode, city, personal_description, signup_date, score, score_counter, password, role', 'safe', 'on'=>'search'),
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
			'events' => array(self::HAS_MANY, 'Events', 'USER_idUser'),
			'guests' => array(self::HAS_MANY, 'Guests', 'USER_idUser'),
			'picturesUsers' => array(self::HAS_MANY, 'PicturesUser', 'USER_idUser'),
			'recipes' => array(self::HAS_MANY, 'Recipe', 'USER_idUser'),
			'scores' => array(self::HAS_MANY, 'Score', 'USER_idUser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUser' => 'Id User',
			'Username' => 'Username',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'EMail' => 'Email',
			'year_of_birth' => 'Year Of Birth',
			'street' => 'Street',
			'house_number' => 'House Number',
			'postcode' => 'Postcode',
			'city' => 'City',
			'personal_description' => 'Personal Description',
			'signup_date' => 'Signup Date',
			'score' => 'Score',
			'score_counter' => 'Score Counter',
			'password' => 'Password',
			'role' => 'Role',
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

		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('Username',$this->Username,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('EMail',$this->EMail,true);
		$criteria->compare('year_of_birth',$this->year_of_birth,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('house_number',$this->house_number,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('personal_description',$this->personal_description,true);
		$criteria->compare('signup_date',$this->signup_date,true);
		$criteria->compare('score',$this->score);
		$criteria->compare('score_counter',$this->score_counter);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
