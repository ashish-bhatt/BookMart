<?php

class EAutoCompleteAction extends CAction
{
	public $book;
	public function run()
	{
		$results = array();
		$book = new $this->book;
		$criteria=new CDbCriteria;
		$criteria->addSearchCondition('bookname', $keyword);
		//$criteria->addSearchCondition('author', $keyword);
		
		$book = $book->findAll($criteria);
		foreach($book as $m)
		{
			$results[] = $m->{'bookname'};
		}
		echo CJSON::encode(results);
	}
}
?>