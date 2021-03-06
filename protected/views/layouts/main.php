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
	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"/>
	<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/black-tie/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans&amp;subset=latin" />
	<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/youtube-player.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<!--  <script>window.jQuery || document.write('<script src="/js/jquery.js"><\/script>')</script>-->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js"></script>
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>  -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.youtube.player.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jcarousel.min.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
       <meta name="description" content="Ascolta tutta la musica che vuoi, guarda i video musicali attraverso un percorso di sensazioni e parole" /><meta name="copyright" content="Staimusic" />
<meta name="keywords" content="musica, musica youtube, musica anni 80, musica anni 70, musica rock, musica dance, musica commerciale, musica elettronica,musica streaming, musica youtube, video youtube, video musicali,videogratis,canzoni famose, canzoni italiane" />

</head>

<body>

<div class="total_content" id="page">

	<div id="header">
	  <div id="logo">       
              <div id="menulogo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/staimusic-logo.png" border="0" alt="<?php echo CHtml::encode(Yii::app()->name); ?>" ></div>
              <div id="payoff">Just play your sound!</div>
          </div>

 <div id="share-box">
<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fstaimusic&amp;width=225&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=24" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:225px; height:21px;" allowTransparency="true"></iframe>
</div>
<!--  <div id="language">
	
		//echo CHtml::link('IT',array('/site/index','langInput'=>'IT'), array('class'=>'languageLink1'));
		//echo CHtml::link('EN',array('/site/index','langInput'=>'EN'), array('class'=>'languageLink2'));
	
</div> -->
<div  id="language-selector" style="float:right; margin:5px;">
    <?php 
        $this->widget('application.components.widgets.LanguageSelector');
    ?>
</div>

          <div id="banner-top"><a href="http://www.expobrand.it" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Expobrand.jpg" border="0" ></a></div>


	</div><!-- header -->

	<div id="mainmenu">
		<?php 
			$currLang = Yii::app()->language;
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'Home', 'url'=>Yii::app()->baseUrl),
				//array('label'=>'Home', 'url'=>Yii::app()->createUrl('/Site/index')),
				//array('label'=>Yii::t('msg','HOME'), 'url'=>array(Utilities::getStaticUrls($currLang, 'home'))),
				array('label'=>Yii::t('msg','HOME'), 'url'=>array('/'.substr($currLang,0,2))),
				//array('label'=>Yii::t('msg','HOME'), 'url'=>array(Yii::app()->createUrl('/'))),

// 				array('label'=>Yii::t('msg','ABOUT'), 'url'=>array('/Site/page', 'view'=>'about')),
//              array('label'=>Yii::t('msg','NOTE'), 'url'=>array('/site/page', 'view'=>'note')),
// 				array('label'=>Yii::t('msg','CONTACT'), 'url'=>array('/Site/contact')),
// 				array('label'=>Yii::t('msg','LOGIN'), 'url'=>array('/Site/login'), 'visible'=>Yii::app()->user->isGuest),
				
				array('label'=>Yii::t('msg','ABOUT'), 'url'=>array(Utilities::getStaticUrls($currLang, 'about'))),
				array('label'=>Yii::t('msg','NOTE'), 'url'=>array(Utilities::getStaticUrls($currLang, 'note'))),
				array('label'=>Yii::t('msg','CONTACT'), 'url'=>array(Utilities::getStaticUrls($currLang, 'contact'))),
				array('label'=>Yii::t('msg','LOGIN'), 'url'=>array(Utilities::getStaticUrls($currLang, 'login')), 'visible'=>Yii::app()->user->isGuest),


				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/Site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<!--  <div class="container darkbg">
		<div id="headercont">
			<div id="mod_mainsearch">
				<div id="search" class="header-answer">Cosa ti fa ballare e battere il cuore?</div>
					<div class="header-form">
					<input type="text" class='search_input'/><button type="button" class='search_button'>Go</button>
				</div>
			</div><br><br><br><br><br>
		</div>
	</div> -->
	
	<?php echo $content; ?>

	<div class="clear"></div>
	
	<div id="footer"><div class="footer-col"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/staimusic-logosmall.png" border="0" alt="staimusic project" height="46px" width="100px"><br/>
		Copyright &copy; <?php echo date('Y'); ?> by Staimusic.<br/>
		All Rights Reserved.<br/>
		<!--<?php echo Yii::powered(); ?>--></div> 
                <div class="footer-col2">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'Home', 'url'=>Yii::app()->baseUrl),
				//array('label'=>'Home', 'url'=>Yii::app()->createUrl('/Site/index')),
				array('label'=>Yii::t('msg','HOME'), 'url'=>array(Yii::app()->createUrl('/'))),
				//array('label'=>Yii::t('msg','HOME'), 'url'=>Yii::app()->createUrl('/Site/index')),
				array('label'=>Yii::t('msg','ABOUT'), 'url'=>array('/Site/page', 'view'=>'about')),
                array('label'=>Yii::t('msg','NOTE'), 'url'=>array('/site/page', 'view'=>'note')),
				array('label'=>Yii::t('msg','CONTACT'), 'url'=>array('/Site/contact')),
				array('label'=>Yii::t('msg','LOGIN'), 'url'=>array('/Site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/Site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
               </div> 
                        <div class="footer-col3">



               </div> 
                                <div class="footer-col"></div> 
	</div><!-- footer -->

</div><!-- page -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48591946-1', 'staimusic.com');
  ga('send', 'pageview');

</script>
</body>
</html>
