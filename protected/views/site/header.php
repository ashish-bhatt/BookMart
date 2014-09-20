<div class="top-bar">
<div class="box">
<a href="#"><?php if(isset(Yii::app()->session['login']) && Yii::app()->session['login'] == 1) echo $_SESSION['username'].', '; ?>Welcome to BookMart!</a>
		<?php if(!isset(Yii::app()->session['login']) || Yii::app()->session['login'] == 0)
		     echo CHtml::link('Register / Login ',array('Login/index'));
		else if (isset($_SESSION['login']) && $_SESSION['login'] == 1)
		     echo CHtml::link('Logout',array('Home/logout'));
		?>
                <a href="#">Bag $<?php if(isset($_SESSION['totalamount'])) echo $_SESSION['totalamount']; 
                								 else echo '0.00'; ?></a>
                <a href="#">Checkout</a>
                <select id="combo">
                  <option value="volvo"></option>
                  <option value="saab"></option>
                  <option value="opel"></option>
                  <option value="audi"></option>
                </select>
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
						'model'=>$this->model,
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