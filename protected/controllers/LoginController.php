<?php
class LoginController extends Controller
{

	public function actionIndex()
	{
		$this->render('index');
	}
	public $layout='//layouts/style.php';
	
	public function actionRegister()
	{
		$user = new Users();
		$user->username = $_POST['username'];
		$user->hash = Utils::generateHash($_POST['password']);
		$user->email = $_POST['email'];
		try
		{
			$saved = $user->save(false);
			if($saved)
			{
				Yii::app()->session['login'] = 2;
			}
			else
			{
				Yii::app()->session['login'] = 3;
			}
		}
		catch(CDbException $ex)
		{
			Yii::app()->session['login'] = 3;
		}
		
		$this->render('index');
	}
	
	public function actionLogin()
	{
		$user = new Users();
		
		$criteria=new CDbCriteria;
		$criteria->compare('username',$_POST['username']);
		$user = $user->find($criteria);
		
		if(!is_null($user))
		{
			if($user->hash === utils::generateReverseHash($_POST['password'], $user->hash))
			{
				Yii::app()->session['login'] = 1;
				Yii::app()->session['username'] = $user->username;
				Yii::app()->session['userid'] = $user->userid;
				
				//Get the old cart items
				$cart = new Cart();
				$criteria=new CDbCriteria;
				$criteria->compare('userid',$user->userid);
				$cart = $cart->findAll($criteria);
				$totalamount = 0;
				foreach($cart as $item)
				{
					$totalamount += $item->prodprice;
				}

				Yii::app()->session['cart'] = $cart;
				Yii::app()->session['totalamount'] = $totalamount;
				$cart = new Cart();
				$cart->deleteAll($criteria);
				
				$this->redirect(array('home/index'));
			}
		}

		//Users credentials are not valid
		Yii::app()->session['login'] = 4;

		$this->redirect(array('Login/index'));
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