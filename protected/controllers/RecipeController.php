<?php

class RecipeController extends Controller
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
                'actions' => array('index', 'view','indexFiltered'), // actions, die users oder roles verwenden dürfen
                'users' => array('*'), // spezielle User auswählen; HIER: alle
                'roles' => array('reader'), // spezielle Rolle: reader
            ),
            array('allow', // allow authenticated user to perform 'create' 'update' 'delete' actions
                'actions' => array('create', 'update', 'delete'),
                'roles' => array('author'),
            ),
            array('allow', // allow admin user to perform all actions
                'actions' => array('create', 'update', 'delete', 'admin'),
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
// $params = array('recipe'=>$model);
// var_dump(Yii::app()->user->checkAccess('readRecipe'));
// var_dump(Yii::app()->user->checkAccess('createRecipe'));
// var_dump(Yii::app()->user->checkAccess('updateOwnRecipe',$params));
// var_dump(Yii::app()->user->checkAccess('deleteOwnRecipe',$params));
// var_dump(Yii::app()->user->checkAccess('manageRecipe'));            
            
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
		$model=new Recipe;
		$model_ingredents= new Ingredents; // f�r den Array in der $_POSTS Variable
		$model_picturesrecipe = new PicturesRecipe; 
                
              

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Recipe'],$_POST['Ingredents'],$_POST['PicturesRecipe']))
		{
                    var_dump($_POST);
                    
                    
                        $savestring=dirname(Yii::app()->request->scriptFile)."\\"."pictures_recipes"."\\";
                        $model_picturesrecipe->attributes=$_POST['PicturesRecipe'];
                    if (CUploadedFile::getInstance($model_picturesrecipe, 'file_name')){
                        $model_picturesrecipe->file_name=  CUploadedFile::getInstance($model_picturesrecipe, 'file_name');
                        $savestring.=$model_picturesrecipe->file_name->getName();
                    }
			$model->attributes=$_POST['Recipe'];

//			var_dump($_POST['Recipe']);
//			var_dump($_POST['Ingredents']);
//			var_dump($_POST['Ingredents']['0']);
			
			//setting the current user id while creating a new recipe
			//$model->attributes->USER_idUser=Yii::app()->user->getId();
			if($model->save())
			{
                            if (CUploadedFile::getInstance($model_picturesrecipe, 'file_name')){
                                //save picture
                                $model_picturesrecipe->RECIPE_idRECIPE=$model->idRECIPE;
                                $model_picturesrecipe->save();
                                $model_picturesrecipe->file_name->saveAs($savestring);
                            }
                            
			//�go through array of ingredents and save it 
				for ($i=0; $i< sizeof($_POST['Ingredents']); $i++){
					
					$model_ingredent= new Ingredents; // einzelnes Ingredent

					$model_ingredent->RECIPE_idRECIPE=$model->idRECIPE;
					$model_ingredent->name=$_POST['Ingredents'][$i]['name'];
					$model_ingredent->amount=$_POST['Ingredents'][$i]['amount'];
					$model_ingredent->amount_description=$_POST['Ingredents'][$i]['amount_description'];
					$model_ingredent->save();
				}
				
				
				$this->redirect(array('view','id'=>$model->idRECIPE));	
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
			'model_ingredents'=>$model_ingredents,
                        'model_picturesrecipe'=>$model_picturesrecipe,
		));
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

		if(isset($_POST['Recipe']))
		{
			$model->attributes=$_POST['Recipe'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idRECIPE));
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
		$dataProvider=new CActiveDataProvider('Recipe');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Recipe('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Recipe']))
			$model->attributes=$_GET['Recipe'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Recipe the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Recipe::model()->findByPk($id);
		//model f�r die Zutaten 
		//$model_ingredents=Ingredents::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Recipe $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='recipe-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	//Erstellen der Zuatetn durch liste kp ob es hier richtig am platz ist  
	
	
	
	

	
	
}
