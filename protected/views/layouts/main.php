<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <meta name="viewport" content="width=device-width">  
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	
	<link rel="stylesheet" href="css/style.css"/>
	<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/black-tie/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans&amp;subset=latin" />
	<link type="text/css" rel="stylesheet" href="css/youtube-player.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery.js"><\/script>')</script>
	<script src="js/scripts.js"></script>
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>  -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
	<script type="text/javascript" src="js/jquery.youtube.player.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="total_content" id="page">

	<div id="header">
	  <div id="logo">       
              <div id="menulogo"><img src="images/logo.png" border="0" alt="<?php echo CHtml::encode(Yii::app()->name); ?>" ></div>
              <div id="payoff">Just play your sound!</div>
          </div>
          <div id="banner-top"></div>


	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/page')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                                array('label'=>'Note', 'url'=>array('/site/page', 'view'=>'note')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer"><div class="footer-col"><img src="images/staimusic-logosmall.png" border="0" alt="staimusic project" height="46px" width="100px"><br/>
		Copyright &copy; <?php echo date('Y'); ?> by Staimusic.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?></div> 
                <div class="footer-col"></div> 
                        <div class="footer-col"></div> 
                                <div class="footer-col"></div> 
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
