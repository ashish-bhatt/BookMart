<div id="slider">
	<a href="#" target="_blank"> <img src="<?php echo $baseUrl.'/img/image-slider-1.jpg'?>" />
	</a> <a class="lazyImage" href="<?php echo $baseUrl.'/img/image-slider-2.jpg'?>"></a>
	<a href="http://www.menucool.com/javascript-image-slider"><b data-src="<?php echo $baseUrl.'/img/image-slider-3.jpg'?>"></b></a> 
	<a class="lazyImage" href="<?php echo $baseUrl.'/img/image-slider-4.jpg'?>" title=""></a>
</div>
<!--thumbnails-->
<div id="thumbs">
	<div class="thumb">
		<div class="frame">
			<img src="<?php echo $baseUrl.'/img/thumb1.jpg'?>" />
		</div>
		<div class="thumb-content"></div>
		<div style="clear: both;"></div>
	</div>
	<div class="thumb">
		<div class="frame">
			<img src="<?php echo $baseUrl.'/img/thumb2.jpg'?>" />
		</div>
		<div class="thumb-content"></div>
		<div style="clear: both;"></div>
	</div>
	<div class="thumb">
		<div class="frame">
			<img src="<?php echo $baseUrl.'/img/thumb3.jpg'?>" />
		</div>
		<div class="thumb-content"></div>
		<div style="clear: both;"></div>
	</div>
	<div class="thumb">
		<div class="frame">
			<img src="<?php echo $baseUrl.'/img/thumb4.jpg'?>" />
		</div>
		<div class="thumb-content"></div>
		<div style="clear: both;"></div>
	</div>

	<!--clear above float:left elements. It is required if above #slider is styled as float:left. -->
	<div style="clear: both; height: 0;"></div>
</div>