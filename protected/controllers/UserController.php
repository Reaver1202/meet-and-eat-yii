<?php

class UserController extends Controller
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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('create'), // actions, die users oder roles verwenden dürfen
//                'users' => array('*'), // spezielle User auswählen; HIER: alle
                'roles' => array('reader'), // spezielle Rolle: reader
            ),
            array('allow', // allow authenticated user to perform 'create' 'update' 'delete' actions
                'actions' => array('view','update','delete'),
                'roles' => array('author'),
            ),
            array('allow', // allow admin user to perform all actions
                'actions' => array('index', 'view','indexFiltered','create', 'update', 'delete', 'admin'),
                'roles' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
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
// $params = array('user'=>$model);
// var_dump(Yii::app()->user->checkAccess('readUser'));
// var_dump(Yii::app()->user->checkAccess('createUser'));
// var_dump(Yii::app()->user->checkAccess('readOwnUser',$params));
// var_dump(Yii::app()->user->checkAccess('updateOwnUser',$params));
// var_dump(Yii::app()->user->checkAccess('deleteOwnUser',$params));
// var_dump(Yii::app()->user->checkAccess('manageUser')); 
 
                $model = $this->loadModel($id);
                $params = array('user'=>$model);
                if (Yii::app()->user->checkAccess('readOwnUser',$params) || Yii::app()->user->checkAccess('readUser')){
                    $this->render('view',array(
                            'model'=>$this->loadModel($id),
                    ));
                }else
                    throw new CHttpException(403, 'You are not authorized to perform this action');
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            if(!Yii::app()->user->getId()){
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save()){
				$auth=Yii::app()->authManager;
                                $auth->assign('author',$model->idUser);
				$this->redirect(array('view','id'=>$model->idUser));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
		));
            }else{
                $this->redirect(array('index'));
            }
		
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $model=$this->loadModel($id);
            $params = array('user'=>$model);
            if (Yii::app()->user->checkAccess('updateOwnUser',$params) || Yii::app()->user->checkAccess('updateUser')){
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idUser));
		}

		$this->render('update',array(
			'model'=>$model,
		));
            }else
                    throw new CHttpException(403, 'You are not authorized to perform this action');
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
            $model=$this->loadModel($id);
            $params = array('user'=>$model);
            if (Yii::app()->user->checkAccess('deleteOwnUser',$params) || Yii::app()->user->checkAccess('deleteUser')){

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));             
            }else
                    throw new CHttpException(403, 'You are not authorized to perform this action');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
