<?php
$baseUrl = Yii::app ()->baseUrl;
$cs = Yii::app ()->getClientScript ();
$cs->registerScriptFile ( $baseUrl . '/js/jquery-1.7.1.min.js' );
$cs->registerScriptFile ( $baseUrl . '/js/flowslider.jquery.js' );
$cs->registerScriptFile ( $baseUrl . '/js/genvalidator.js' );
$cs->registerScriptFile ( $baseUrl . '/js/js-image-slider.js' );
$cs->registerCssFile ( $baseUrl . '/css/style.css' );
$cs->registerCssFile ( $baseUrl . '/css/js-image-slider.css' );
?>