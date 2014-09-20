<div class="top-bar">
	<div class="box">
		<a href="#">
			<?php if(isset(Yii::app()->session['login']) && Yii::app()->session['login'] == 1) echo Yii::app()->session['username'].', '; 
					else if(!isset(Yii::app()->session['login']) || Yii::app()->session['login'] != 1) echo 'Guest, '; ?>
			Welcome to BookMart!
		</a>
		<?php if(!isset(Yii::app()->session['login']) || Yii::app()->session['login'] == 0)
			     echo CHtml::link('Register / Login ',array('Login/index'));
			else if (isset(Yii::app()->session['login']) && Yii::app()->session['login'] == 1)
			     echo CHtml::link('Logout',array('Home/logout'));
		?>
		<?php if(isset(Yii::app()->session['totalamount'])) $amt = Yii::app()->session['totalamount']; else $amt = '0.00';
					echo CHtml::link('Bag $'.$amt,array('Item/checkout')); ?>
    </div>
</div>
        
<div class="top-bar">
	<div id="search-bar">
    		<div class="box">
        		<h1>BOOK-MART</h1>

        		<form method="GET" action="<?php echo $baseUrl.'/index.php/Item/DisplayItem'; ?>" style="float:left;margin-left:10%;">
     				<input type="hidden" id="bookid" name="bookid"/>
                    <?php 
					$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					    'name'=>'bookname',
						'id'=>'widget',
					    'sourceUrl'=>$this->createUrl('Home/Search'),
						
					    // additional javascript options for the autocomplete plugin
					    'options'=>array(
					            'showAnim'=>'fold',
						'select' => "js:function(event, ui) {
            							jQuery('#bookid').val(ui.item.id);
            							return true;
									}",
					    ),
						'htmlOptions' => array(
						'placeholder' => 'Search for anything here',
						'submit' => '',
						)	
					));
					?> 
					</form>
                    <a href=""><img src="<?php echo $baseUrl.'/img/search.jpeg'?>"/></a>
                    <a href=""><img src="<?php echo $baseUrl.'/img/google.png'?>"/></a>
                    <a href=""><img src="<?php echo $baseUrl.'/img/facebook.png'?>"/></a>
                    <a href=""><img src="<?php echo $baseUrl.'/img/twitter.jpeg'?>"/></a>
                    <a href=""><img src="<?php echo $baseUrl.'/img/youtube.jpeg'?>"/></a>
       	</div>
  	</div>
</div>