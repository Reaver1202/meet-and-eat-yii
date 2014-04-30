<?php

class GuestsController extends Controller
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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','createManual', 'acceptGuest','declineGuest'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new Guests;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Guests']))
		{
			$model->attributes=$_POST['Guests'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idGUESTS));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreateManual()
	{
		$model=new Guests;
		$compare_model = new Guests; 
		$event = new Events; 

        		
			
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		
		//$compare_model=Guests::model()->findByPk($id);
		
			$model->EVENTS_idEVENTS=$_GET['id'];
			$model->USER_idUser=Yii::app()->user->getId();;
			$model->approved=0;
			
			//$event = Events::model()->findByPk($model->EVENTS_idEVENTS); 
			//$compare_model=Guests::model()->findByAttributes($id);
			$compare_model=Guests::model()->find(array(
				'select'=>'*',
				'condition'=>'EVENTS_idEVENTS=:eventID AND USER_idUser=:userID',
				'params'=>array(':eventID'=>$model->EVENTS_idEVENTS,':userID'=>$model->USER_idUser),
				//'condition'=>'USER_idUser=:userID',
				//'params'=>array(':userID'=>$model->USER_idUser),
			));
		 
			
			var_dump($compare_model); 
			if(!$compare_model){
			if($model->save()){};
				$this->redirect(array('events/view','id'=>$model->EVENTS_idEVENTS));
		}else{

      //  Yii::app()->user->setFlash('block-error', '<h4 class="alert-heading">Attention</h4><p>Lorem ipsum dolor sit amet, consetetur sadipscing elite...</p><p>'.EBootstrap::ibutton('Primary', '#', 'danger').' '.EBootstrap::ibutton('Default', '#').'</p>');
print '<script> window.confirm("Sie haben sich bereits eingetragen"); window.location.href="index.php?r=events/view&id='.$model->EVENTS_idEVENTS.'"</script>';
		 		// Yii::app()->user->setFlash('notice', "Sie sind schon eingetragen");

         //$this->redirect('js:document.location.href="index.php?r=events/view&id='.$model->EVENTS_idEVENTS); 
		  //    CHtml::refresh('',''); 
		 
		}

		
		//$this->render('create',array(
			//'model'=>$model,
		//));
	}
	
	public function actionAcceptGuest($id)
	{
		$model=$this->loadModel($id);
//                $model_event=  Events::model()->findAllByAttributes( array('idEVENTS' => $model->EVENTS_idEVENTS));
                var_dump($model_event);
		// check access, ob aktueller User ein Admin oder der Author des Events ist
		$params = array('events'=>$model);
//                var_dump(Yii::app()->user->checkAccess('updateOwnEvent',$params) );
//                var_dump(Yii::app()->user->checkAccess('updateEvent'));
		//if(Yii::app()->user->checkAccess('updateOwnEvent',$params) || Yii::app()->user->checkAccess('updateEvent')){

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);				
			
				$model->approved=1;
				if($model->save())
					$this->redirect(array('events/view','id'=>$model->EVENTS_idEVENTS));		

			//$this->render('update',array(
			//	'model'=>$model,
		//	));
		//}else throw new CHttpException(403, 'You are not authorized to perform this action');
	}
	
	public function actionDeclineGuest($id)
	{
		$model=$this->loadModel($id);
		// check access, ob aktueller User ein Admin oder der Author des Events ist
		$params = array('events'=>$model);
		//if(Yii::app()->user->checkAccess('updateOwnEvent',$params) || Yii::app()->user->checkAccess('updateEvent')){

			$idEVENT=$model->EVENTS_idEVENTS; 
			
			$model->delete(); 
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			//if(!isset($_GET['ajax']))
			//		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			$this->redirect(array('events/view','id'=>$idEVENT));
		//}else throw new CHttpException(403, 'You are not authorized to perform this action');
	}
	
	
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	 
	 
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Guests']))
		{
			$model->attributes=$_POST['Guests'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idGUESTS));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Guests');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Guests('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Guests']))
			$model->attributes=$_GET['Guests'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Guests the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Guests::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Guests $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='guests-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
