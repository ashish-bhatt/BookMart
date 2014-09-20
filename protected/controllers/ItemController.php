<?php

class ItemController extends Controller
{
	public function actionIndex()
	{
		$this->render('index', array('additem'=> true));
	}
	public $layout='//layouts/style.php';
	
	public function actionReadFile()
	{

	}
	
	public function actionaddToCart()
	{
		$cart = new Cart();
		//setting the cart if not already set up
		if(!isset(Yii::app()->session['cart']))
		{
			$cartarray = array();
			Yii::app()->session['cart'] = $cartarray;
		}
		$cartarray = Yii::app()->session['cart'];
		$currentProduct = Yii::app()->session['currProd'];
		
		//filling the cart item with information
		$cart->prodid = $currentProduct->bookid;
		$cart->userid = Yii::app()->session['userid'];
		$cart->prodname = $currentProduct->bookname;
		$cart->prodprice = $currentProduct->price;
		
		array_push($cartarray, $cart);
		//pushing the cart array to session
		Yii::app()->session['cart'] = $cartarray;
		
		//if total amount is already set
		if(isset(Yii::app()->session['totalamount']))
		{
			//add the current book's price to the total amount
			$amount = $currentProduct->price + Yii::app()->session['totalamount'];
			Yii::app()->session['totalamount'] = $amount;
		}
		else 
		{
			//set the totalamount to the current book's price
			Yii::app()->session['totalamount'] = $currentProduct->price;
		}
		//check if the item is already present in the cart, if present don't let user to add another instance
		$cartarray = Yii::app()->session['cart'];
		$additem = true;
		foreach ($cartarray as $item)
		{
			if($item->prodid == $currentProduct->bookid)
			{
				$additem = false;
				break;
			}
		}
		Yii::app()->session['paymentdone'] = false;
		$this->render('index',array('id'=>$currentProduct->bookid, 'bookname'=>$currentProduct->bookname, 'additem'=>$additem));
	}
	
	public function actionSearch()
	{
		$results = array();
		$book = new Books();
		$criteria=new CDbCriteria;
		$book = new Books();
		$criteria->addSearchCondition('bookname', $keyword);
		//getting the book model based on the criteria
		$book = $book->findAll($criteria);
		
		//pushing all the books into the result array to be displayed
		foreach($book as $m)
		{
			$results[] = $m->{'bookname'};
		}
		return CJSON::encode($results);
	}
	
	public function actionDisplayItem()
	{
		$id = $_GET['bookid'];
		$book = new Books();
		
		$criteria=new CDbCriteria;
		$criteria->Compare('bookid', $id);
		//Get the book from the book id
		$book = $book->find($criteria);
		
		//set the current book in the session
		Yii::app()->session['currProd'] = $book;
		
		//check if the item is already present in the cart, if present don't let user to add another instance
		$additem = true;
		if(isset(Yii::app()->session['cart']))
		{
			$cartarray = Yii::app()->session['cart'];
			foreach ($cartarray as $item)
			{
				if($item->prodid == $book->bookid)
				{
					$additem = false;
					break;
				}
			}
		}

		$this->render('index',array('id'=>$id, 'bookname'=>$book->bookname,'additem'=>$additem));
	}
	
	public function actionCheckout()
	{
		$this->render('checkout');
	}
	
	public function actionRemoveItem()
	{
		$id = $_GET['id'];
		$cartarray = Yii::app()->session['cart'];
		$counter = 0;
		
		//go through each cart item
		foreach($cartarray as $item)
		{
			//if product id matches, then remove the item from array and reduce the totalamount
			if($item->prodid == $id)
			{
				Yii::app()->session['totalamount'] -= $item->prodprice;
				array_splice($cartarray, $counter,1);
				break;
			}
			$counter++;
		}
		//finally set the new cart array to the session
		Yii::app()->session['cart'] = $cartarray;
		$this->render('checkout');
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