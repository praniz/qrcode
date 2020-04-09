<?php

class QrQuestionSetController extends Controller
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
		//	'postOnly + delete', // we only allow deletion via POST request
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
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),*/
			array('allow', 
				'actions'=>array('admin','preview'),
				'users'=>array('user'),
			),
			array('allow',
				'actions'=>array('admin','delete','preview','create','update','view'),
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
		$model1=new QrQuestion('search');
		$model1->unsetAttributes();  // clear any default values
		if(isset($_GET['QrQuestion']))
			$model1->attributes=$_GET['QrQuestion'];
		
		$model1->idqr_question_set=$id;
	
		$model2=new QrQuestion;

		$this->render('view',array(
			'model'=>$this->loadModel($id),'model1' => $model1 ,'model2' =>$model2
		));

	
	}


	public function actionPreview($id)
	{
	
	$modelQues=QrQuestion::model()->findAll('idqr_question_set ='.$id."");
	

	/*$items = array();
	foreach ($modelQues as $key => $value) {

	$modelAns=new QrAnswer('search');

	if($key == 'idqr_question'){
	$modelAns->idqr_question=$value;
    $items[$value] = $modelAns;
	}

	}*/

//var_dump($modelQues);
	$this->render('preview',array('modelQues' =>$modelQues,'sizeModel'=>count($modelQues)));

	
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new QrQuestionSet;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QrQuestionSet']))
		{
			$model->attributes=$_POST['QrQuestionSet'];

		$this->widget('application.extensions.qrcode.QRCodeGenerator',array(
	    'data' => 'http://www.bryantan.info',
	    'filename' => $model->qrcode.".png",
	    'subfolderVar' => false,
	    'matrixPointSize' => 5,
	    'displayImage'=>false, // default to true, if set to false display a URL path
	    'errorCorrectionLevel'=>'L', // available parameter is L,M,Q,H
	    'matrixPointSize'=>4, // 1 to 10 only
		));


			if($model->save())
				$this->redirect(array('view','id'=>$model->idqr_question_set));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['QrQuestionSet']))
		{
			$model->attributes=$_POST['QrQuestionSet'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idqr_question_set));
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
		$dataProvider=new CActiveDataProvider('QrQuestionSet');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new QrQuestionSet('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['QrQuestionSet']))
			$model->attributes=$_GET['QrQuestionSet'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return QrQuestionSet the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=QrQuestionSet::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param QrQuestionSet $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='qr-question-set-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	


}
