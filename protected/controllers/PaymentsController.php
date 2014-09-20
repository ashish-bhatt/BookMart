<?php

class PaymentsController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public $layout='//layouts/style.php';
	
	public function actionProceedToPayments()
	{
		//Get the copy of the files that the user paid for and give them the download as zip.
		$cardNumber = $_POST['cardno'];
		$card = $_POST['card'];
		$provider = $_POST['provider'];
		$msg = '';
		if(!isset(Yii::app()->session['cart']))
			$this->redirect(array('Home/index'));
		if(Utils::validateCC($cardNumber,$provider))
		{
			$cartarray = Yii::app()->session['cart'];
			$files = array();
			//create zip file here based on time
			$zip = new ZipArchive(); // Load zip library
			$zip_name = time().".zip"; // Zip name
			$location = Yii::getPathOfAlias('application.temp');
			if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
			{
			}
			else
			{
				foreach ($cartarray as $item)
				{
					$bookdata = new Bookdata();
					$criteria=new CDbCriteria;
					$criteria->compare('id',$item->prodid);
					$bookdata = $bookdata->find($criteria);
					$unescapedata = pg_unescape_bytea(stream_get_contents($bookdata->bookdata));
					$zip->addFromString ( $item->prodname.'.epub' , $unescapedata);
				}
				//clear the cart here
				$zip->close();
				$msg = 'Your transaction has been processed successfully. Please wait while we prepare your download.';
			}
			
			if(file_exists($zip_name))
			{
				// push to download the zip
				header('Content-type: application/zip');
				header('Content-Disposition: attachment; filename="'.$zip_name.'"');
				readfile($zip_name);
				// remove zip file is exists in temp path
				unlink($zip_name);
			}
			
			unset(Yii::app()->session['cart']);
			unset(Yii::app()->session['totalamount']);

			Yii::app()->session['paymentdone'] = true;
		}
		else
			$msg = 'Card number is not valid. Please enter a valid card number.';
		$this->render('index',array('msg'=>$msg));
	}
	
	public function actionCheckPayment()
	{
		$done = array('payment'=>Yii::app()->session['paymentdone']);
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