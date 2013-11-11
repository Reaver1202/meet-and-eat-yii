<?php

/**
 * This is the model class for table "score".
 *
 * The followings are the available columns in table 'score':
 * @property integer $idSCORE
 * @property integer $USER_idUser
 * @property string $user_id_target
 * @property string $user_id_source
 * @property integer $score
 * @property string $comment
 *
 * The followings are the available model relations:
 * @property User $uSERIdUser
 */
class Score extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'score';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('USER_idUser, user_id_target, user_id_source, score', 'required'),
			array('USER_idUser, score', 'numerical', 'integerOnly'=>true),
			array('user_id_target, user_id_source', 'length', 'max'=>45),
			array('comment', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idSCORE, USER_idUser, user_id_target, user_id_source, score, comment', 'safe', 'on'=>'search'),
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
			'idSCORE' => 'Id Score',
			'USER_idUser' => 'User Id User',
			'user_id_target' => 'User Id Target',
			'user_id_source' => 'User Id Source',
			'score' => 'Score',
			'comment' => 'Comment',
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

		$criteria->compare('idSCORE',$this->idSCORE);
		$criteria->compare('USER_idUser',$this->USER_idUser);
		$criteria->compare('user_id_target',$this->user_id_target,true);
		$criteria->compare('user_id_source',$this->user_id_source,true);
		$criteria->compare('score',$this->score);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Score the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
