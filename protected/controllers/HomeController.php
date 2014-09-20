<?php

class HomeController extends Controller
{
	public $model;
	
	public function actionIndex()
	{
		if(!isset(Yii::app()->session['userid']))
			Yii::app()->session['userid'] = 0;
		$this->render('index');
	}
	public $layout='//layouts/style.php';
	
	public function actionLogout()
	{
		$cartarray = Yii::app ()->session ['cart'];
		
		foreach ( $cartarray as $item ) {
			$cart = new Cart ();
			$cart->userid = $item->userid;
			$cart->prodid = $item->prodid;
			$cart->prodname = $item->prodname;
			$cart->prodprice = $item->prodprice;
			$cart->save ( false );
		}
		Yii::app()->session->destroy();
		$this->render('index');
	}
	
	public function actionSearch()
	{
		$results = array();
		$book = new Books();
		$criteria=new CDbCriteria;
		//adding % to get the prefix match
		$keyword = $_GET['term'].'%';
		
		//fetch the books based on the keyword typed by the user from DB
		$criteria->addSearchCondition('LOWER(bookname)', strtolower($keyword), false);
		$this->model = $book->findAll($criteria);
		
		//create array with books information that we want to pass
		foreach ($this->model as $item)
		{
			$results[] = array(
					'label'=>$item->{'bookname'},  // label for dropdown list
					'value'=>$item->{'bookname'},  // value for input field
					'id'=>$item->{'bookid'},
			);
		}
		//simply return the json for the result array
		echo CJSON::encode($results);
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

class LoadImages
{
	//public static function
}