<?php

class ProductController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
/*
	public function actionList()
	{
		$this->render('listProduct');
	}
*/
	public function actionList($type){
    $criteria=new CDbCriteria();

    $count=Product::model()->count($criteria);
    $pages=new CPagination($count);

    // results per page
    $pages->pageSize=12;
    $pages->applyLimit($criteria);
	$models = Product::model()->findAllByAttributes(array('id_type' => $type),$criteria);
    	// $models=Product::model()->findAll($criteria);
   	$dropdownProductType = Type::model()->findAll();
	
   

    $this->render('listProduct', array(
    'models' => $models,
         'pages' => $pages,'dropdownProductType' => $dropdownProductType
    ));
}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}