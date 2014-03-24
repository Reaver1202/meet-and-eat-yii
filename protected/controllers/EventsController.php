<?php

class EventsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{

/* 
 * Die Regeln bestimmen, ob der aktuelle benutzer überhaupt auf die Funktion zugreifen kann. 
 * d.h. falls er nicht berechtigt ist, wird nicht die Funktion aufgerufen und dessen Fehlermeldung,
 * sondern die generische Fehlermeldung 403 für keine Berechtigung.
 * Beispiel: 	gebe user-role 'auther' zu den bisherigen Berchtigungen zu 'create','update','delete'
 * 				noch ,'admin' hinzu.
 * Vorher: 		sie haben keine Berechtigung
 * Nachher: 	Funktion wird aufgerufen und auf UNSERE Weise geprüft, ob er Zugriff hat.
 */
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),	// actions, die users oder roles verwenden dürfen
				'users'=>array('*'),				// spezielle User auswählen; HIER: alle
				'roles'=>array('reader'),			// spezielle Rolle: reader
			),
		
			array('allow', // allow authenticated user to perform 'create' 'update' 'delete' actions
				'actions'=>array('create','update','delete'),
				'roles'=>array('author'),
			),
		
			array('allow', // allow admin user to perform all actions
				'actions'=>array('create','update','delete','admin'),
				'roles'=>array('admin'),
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{

// TESTING: funktioniert
// $model = $this->loadModel($id);
// $params = array('events'=>$model);
// var_dump(Yii::app()->user->checkAccess('readEvent'));
// var_dump(Yii::app()->user->checkAccess('createEvent'));
// var_dump(Yii::app()->user->checkAccess('updateOwnEvent',$params));
// var_dump(Yii::app()->user->checkAccess('deleteOwnEvent',$params));
// var_dump(Yii::app()->user->checkAccess('manageEvent'));


		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Events;
		$model_courses= new Courses; 


//var_dump($params);
//var_dump(Yii::app()->user->checkAccess('createEvent'));
//var_dump(Yii::app()->user->id);
		if (Yii::app()->user->checkAccess('createEvent')){
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Events']))
			{
			
			//var_dump($_POST);
				$model->attributes=$_POST['Events'];


				//$model_course->attributes=$_POST['Courses'];
				//var_dump($_POST);
				//$model_course->course_number=1;
			    
				//$model_course->RECIPE_idRECIPE=2; 
				$model->USER_idUser=Yii::app()->user->getId();
				// echo "<script> console.log(".$model_course.");</script>";
				  
				//$model_course->create(); 
				if($model->save())
				 {
				 
				 for ($i=0; $i< sizeof($_POST['Courses']); $i++){
						
						$model_course= new Courses; // einzelnes course

						$model_course->EVENTS_idEVENTS=$model->idEVENTS;
						$model_course->RECIPE_idRECIPE=$_POST['Courses'][$i]['idRECIPE'];
						$model_course->course_number=$i+1;
						
						$model_course->save();
					}
				 
				 
				 //	$model_course->EVENTS_idEVENTS=$model->idEVENTS;
				 	//if ($model_course->save())
				 		//$this->redirect(array('view','id'=>$model->idEVENTS));
				 } 
					
			}
			

			$this->render('create',array(
				'model'=>$model,
				'model_courses'=>$model_courses,
			));

		}
	}


/*
 #########################################
 FUNKTIONIERT NICHT RICHTIG: 
- es werden nur die Event-Informationen geupdated
- nicht die Gänge
- ebenso sollte man Teilnehmer sehen und approven oder ablehnen können
 #########################################
 */
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$model_course= Courses::model()->findAllByAttributes(
			array('EVENTS_idEVENTS'=>$model->idEVENTS)); 
		//var_dump($model_course[1]->idCOURSES);
		//var_dump($model); 
	
		//$model_coruses = new Array();		
		// $model_course->EVENTS_idEVENTS=$model->idEVENTS;

// TESTING: funktioniert
// $params = array('events'=>$model);
// var_dump(Yii::app()->user->checkAccess('updateOwnEvent',$params));
// var_dump(Yii::app()->user->id);
// var_dump($params["events"]->USER_idUser);



		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//if(Yii::app()->user->getId()==$model->USER_idUser){
		$params = array('events'=>$model);
		if(Yii::app()->user->checkAccess('updateOwnEvent',$params) || Yii::app()->user->checkAccess('updateEvent')){
			if(isset($_POST['Events']))
			{
				$model->attributes=$_POST['Events'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->idEVENTS));
			}

			$this->render('update',array(
				'model'=>$model,
				'model_course'=>$model_course,
			));

		}else throw new CHttpException(403, 'You are not authorized to perform this action');
		
	}

/*
 #########################################
 FUNKTIONIERT NICHT: DB Fehler!!!
- vielleicht weil Events gelöscht wird, aber die Beziehung zu Courses noch existiert --> Konsistenz-Probleme
- hierzu vorher Courses löschen und dann das dazugehörige Event
 #########################################
 */
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//if(Yii::app()->user->getId()==$model->USER_idUser){
		$model=$this->loadModel($id);
		$params = array('events'=>$model);
		if(Yii::app()->user->checkAccess('deleteOwnEvent', $params) || Yii::app()->user->checkAccess('deleteEvent')){

			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));

		}else $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));		
				
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

// TESTING:
//$params = array('events'=>$model);
//var_dump($params);
// var_dump(Yii::app()->user->checkAccess('readEvent'));
// var_dump(Yii::app()->user->checkAccess('createEvent'));
// var_dump(Yii::app()->user->checkAccess('updateEvent'));
// var_dump(Yii::app()->user->checkAccess('updateOwnEvent'));
// var_dump(Yii::app()->user->checkAccess('deleteEvent'));
// var_dump(Yii::app()->user->checkAccess('manageEvent'));
// var_dump(Yii::app()->user->id);
// var_dump(Yii::app()->user->isGuest);

//if(Yii::app()->user->checkAccess('readEvent')){
			$dataProvider=new CActiveDataProvider('Events');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
//}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		//if(Yii::app()->user->getRole()==0){
	
		$model=new Events('search');
		$model->unsetAttributes();  // clear any default values

		var_dump(Yii::app()->user->checkAccess('manageEvent'));
		if (Yii::app()->user->checkAccess('manageEvent')){

			if(isset($_GET['Events']))
				$model->attributes=$_GET['Events'];

			$this->render('admin',array(
				'model'=>$model,
			));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Events the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Events::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Events $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='events-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
