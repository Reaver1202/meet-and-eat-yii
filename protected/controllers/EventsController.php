<?php

class EventsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {

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
    public function actionView($id) {

// TESTING: funktioniert
// $model = $this->loadModel($id);
// $params = array('events'=>$model);
// var_dump(Yii::app()->user->checkAccess('readEvent'));
// var_dump(Yii::app()->user->checkAccess('createEvent'));
// var_dump(Yii::app()->user->checkAccess('updateOwnEvent',$params));
// var_dump(Yii::app()->user->checkAccess('deleteOwnEvent',$params));
// var_dump(Yii::app()->user->checkAccess('manageEvent'));


        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Events;    // Events Object das an View via render() übergeben wird
        $model_courses = new Courses;  // Courses Object das an View via render() übergeben wird
        // $model_picturesrecipe = new PicturesRecipe; 
//var_dump($params);
//var_dump(Yii::app()->user->checkAccess('createEvent'));
//var_dump(Yii::app()->user->id);

        if (Yii::app()->user->checkAccess('createEvent')) {  // checkt ob aktueller Benutzer das Recht hat diese Funktion zu verwenden. (Nur Author order Admin)
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);
            if (isset($_POST['Events'])) {  // Events object in POST Variable kommt vom ???

                //var_dump($_POST);
                $model->attributes = $_POST['Events'];

                $model->USER_idUser = Yii::app()->user->getId();

                if ($model->save()) {  // speichert Event model in DB und gibt bei Erfolg "true" zurück
                    // für jeden Gang / Course ein neues Courses Object, welches mit Werten gefüllt und dann gespeichert wird
                    for ($i = 0; $i < sizeof($_POST['Courses']); $i++) {

                        $model_course = new Courses; // einzelnes course
                        $model_course->EVENTS_idEVENTS = $model->idEVENTS;
                        $model_course->RECIPE_idRECIPE = $_POST['Courses'][$i]['idRECIPE'];
                        $model_course->course_number = $i + 1;
                        $model_course->save();  // speichern in DB
                    }
                    $this->redirect(array('view', 'id' => $model->idEVENTS));
                }
            }


            $this->render('create', array(// rendered create view von Events
                'model' => $model, // event model wird übergeben
                'model_courses' => $model_courses,
                    //'model_picturesrecipe'=>$model_picturesrecipe,                                        // courses model wird übergeben
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
    public function actionUpdate($id) {
        $model = $this->loadModel($id);  // lädt aktuelles Event Model
        $model_courses = Courses::model()->findAllByAttributes(
                array('EVENTS_idEVENTS' => $model->idEVENTS));  // lädt alle Courses, deren EVENTS_idEVENTS als Wert die ID des aktuellen Events haben
// ein Wert, falls keine Gänge Existieren, damit keine Exception auftritt sondern lediglich ein nicht gesetztes Select-Menü
        $idArray[0] = 0;
        for ($i = 0; $i < count($model_courses); $i++) {   // für jeden Gang / Course wird hier speziell nur die ID des jeweiligen Rezeptes in einen Array gespeichert
            $idArray[$i] = $model_courses[$i]->RECIPE_idRECIPE;
        }
        $_GET['courses_IDs'] = $idArray;   // damit die View später in JavaScript mit den Daten arbeiten kann, wird hier das Array mit den Courses bzw. Rezept IDs in eine GET Variable geschrieben
        var_dump($idArray);

// TESTING: funktioniert
// $params = array('events'=>$model);
// var_dump(Yii::app()->user->checkAccess('updateOwnEvent',$params));
// var_dump(Yii::app()->user->id);
// var_dump($params["events"]->USER_idUser);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $params = array('events' => $model);
        if (Yii::app()->user->checkAccess('updateOwnEvent', $params) || Yii::app()->user->checkAccess('updateEvent')) {
            if (isset($_POST['Events'])) {
                $model->attributes = $_POST['Events']; // holt sich aus der POST Variable Events die Daten des veränderten Formulars
                if ($model->save()) {      // speichert das gesamte aktualisierte Event Object
                    for ($d = 0; $d < sizeof($model_courses); $d++) {  // löscht zunächst alle bisherigen Courses
                        $model_courses[$d]->delete();
                    }
                }

                for ($i = 0; $i < sizeof($_POST['Courses']); $i++) { // erstellt für alle Courses im Fromular ein neues Course Object, dass in die DB gespeichert wird
                    $model_course = new Courses; // einzelnes course
                    $model_course->EVENTS_idEVENTS = $model->idEVENTS;
                    $model_course->RECIPE_idRECIPE = $_POST['Courses'][$i]['idRECIPE'];
                    $model_course->course_number = $i + 1;
                    $model_course->save();
                }

                $this->redirect(array('view', 'id' => $model->idEVENTS)); // redirects to the Event page 
            }

            $this->render('update', array(// renders update view
                'model' => $model,
                'model_courses' => $model_courses,
            ));
        }
        else
            throw new CHttpException(403, 'You are not authorized to perform this action');
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
    public function actionDelete($id) {
        //if(Yii::app()->user->getId()==$model->USER_idUser){
        $model = $this->loadModel($id);
        $params = array('events' => $model);
        if (Yii::app()->user->checkAccess('deleteOwnEvent', $params) || Yii::app()->user->checkAccess('deleteEvent')) {

            //Courses zu bestimmtem Event in Array
            $model_courses = Courses::model()->findAllByAttributes(
                    array('EVENTS_idEVENTS' => $model->idEVENTS));
            //Löschen der Courses im array
            for ($d = 0; $d < sizeof($model_courses); $d++) {  // löscht zunächst alle bisherigen Courses
                $model_courses[$d]->delete();
            }

            $model_guests = Guests::model()->findAllByAttributes(
                    array('EVENTS_idEVENTS' => $model->idEVENTS));
            //Löschen der Courses im array
            for ($d = 0; $d < sizeof($model_guests); $d++) {  // löscht zunächst alle bisherigen Courses
                $model_guests[$d]->delete();
            }



            $this->loadModel($id)->delete();
//############################
//TO DO rediret zum ListView
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));

            //}else $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));	
        }
        else
            throw new CHttpException(403, 'You are not authorized to perform this action');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

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

       // $city=$_GET['city'];
        
       // $sql = 'SELECT * FROM events';
     //   $dataProvider = new CActiveDataProvider('Events');

$dataProvider = new CActiveDataProvider('Events', array(
        'criteria' => array(
        'condition' => "date>='".date('Y-m-d H:i:s')."'",
        )));
        
        
        
        
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
//}
    }

    //filtered index funtion
    
    public function actionIndexFiltered($city) {

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

       // $city=$_GET['city'];
        
        $sql = 'SELECT * FROM events';
        $dataProvider = new CActiveDataProvider('Events', array(
        'criteria' => array(
        'with' => array('uSERIdUser' => array(
        'condition' => "city='$city'"
        ),
        'together' => true,
        )
        )));


        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
//}
    }
    
    
    
    /**
     * Manages all models.
     */
    public function actionAdmin() {
        //if(Yii::app()->user->getRole()==0){

        $model = new Events('search');
        $model->unsetAttributes();  // clear any default values

        var_dump(Yii::app()->user->checkAccess('manageEvent'));
        if (Yii::app()->user->checkAccess('manageEvent')) {

            if (isset($_GET['Events']))
                $model->attributes = $_GET['Events'];

            $this->render('admin', array(
                'model' => $model,
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
    public function loadModel($id) {
        $model = Events::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Events $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'events-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
