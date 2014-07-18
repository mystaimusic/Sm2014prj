<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$countryCode = Yii::app()->user->getState('countryCode');
		if($countryCode==null){
			if(isset($_REQUEST['langInput'])){
				$countryCode = $_REQUEST['langInput'];
			}else{
				//get it from the ip addr
				$countryCode = 'IT';
			}
			
		}
		
		$orderByTag = 'RAND()';
		$orderByPl = 'RAND()';
		$orderByGen = 'RAND()';
		//echo Yii::trace(CVarDumper::dumpAsString($_GET['order']),'vardump');
		//echo Yii::trace(CVarDumper::dumpAsString($_PUT['order']),'vardump');
		//$orderByClause = Yii::app()->user->getState('orderByClause');
		$orderByClause = 'R';
		if(isset($_REQUEST['flagType'])){
			$orderByClause = $_REQUEST['flagType']; 
			Yii::app()->user->setState('flagType', $orderByClause);
			if($orderByClause == 'A'){
				$orderByTag = 'tagname';
				$orderByPl = 'pltitle';
				$orderByGen = 'genrename';
				
			}
		}
		$countTags = Tags::model()->count();
		$countPlists = Playlists::model()->count();
		$countGenres = Genres::model()->count();
		Yii::app()->user->setState('countTags', $countTags);
		Yii::app()->user->setState('countPlists', $countPlists);
		Yii::app()->user->setState('countGenres', $countGenres);
		
		$dataProvider=new CActiveDataProvider('Tags',
			array(
				'criteria'=>array(
        			//'order'=>'TAGNAME',
        			'order'=>$orderByTag,
    			),
    			'pagination'=>array(
        			'pageSize'=>9, // or another reasonable high value...
    			),
			)
		);
		Utilities::replaceDefaultImageArray($dataProvider->getData());
		
		$dataProviderDec = null;
		if($orderByClause=='A'){
			$dataProviderDec = new CActiveDataProvider('Tags',
				array(
					'criteria'=>array(
						'order'=>$orderByTag . ' DESC',
					),
					'pagination'=>array(
						'pageSize'=>5,
					),
				)
			);
		}
		//$tagsList = $dataProvider->getData(); 
		//shuffle($tagsList);
		//echo Yii::trace(CVarDumper::dumpAsString("--------> sono in SiteController.actionIndex 2"),'vardump');
		//echo Yii::trace(CVarDumper::dumpAsString($dataProviderDec->getData()),'vardump');
		//echo Yii::trace(CVarDumper::dumpAsString($tagsList),'vardump');
		$dataProviderPlaylist = new CActiveDataProvider('Playlists',
			array(
				'criteria'=>array(
					//'order'=>'plid',
					'order'=>$orderByPl,
				),
				'pagination'=>array(
        			'pageSize'=>9,
    			),
			)
		);
		//echo Yii::trace(CVarDumper::dumpAsString($dataProviderPlaylist->getData()),'vardump');
		Utilities::replaceDefaultImageArray($dataProviderPlaylist->getData());
		//echo Yii::trace(CVarDumper::dumpAsString($dataProviderPlaylist->getData()),'vardump');
		
		$dataProviderGenres = new CActiveDataProvider('Genres',
			array(
				'criteria'=>array(
					//'order'=>'GENREID',
					'order'=>$orderByGen,	
				),
				'pagination'=>array('pageSize'=>18),
			)
		);
		Utilities::replaceDefaultImageArray($dataProviderGenres->getData());
		
		//get static data of the index page
		$mainSearchTab = LabelsTable::model()->findByPk(array('label_key'=>'MAINSEARCH','language'=>$countryCode)); // TEST
		$mainsearch = $mainSearchTab->label;
		$orderByRandBtnTab = LabelsTable::model()->findByPk(array('label_key'=>'RANDOM_ORD_BTN','language'=>$countryCode)); // TEST
		$orderByRandBtn = $orderByRandBtnTab->label;
		$orderByAlphaBtnTab = LabelsTable::model()->findByPk(array('label_key'=>'ALPHA_ORDER_BTN','language'=>$countryCode)); // TEST
		$orderByAlphaBtn = $orderByAlphaBtnTab->label;
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'dataProviderDec'=>$dataProviderDec,
			'dataProviderGenres'=>$dataProviderGenres,
			'dataProviderPlaylist'=>$dataProviderPlaylist,
			'mainsearch'=> $mainsearch,
			'orderbyrandbtn'=>$orderByRandBtn,
			'orderbyalphabtn'=>$orderByAlphaBtn,
		));
	}

	public function actionSearch($queryString)
	{
		
	}
	
	//this is an ajax call
	public function actionGetNextTag($currentPage,$type)
	{
		//echo Yii::trace(CVarDumper::dumpAsString("------------> I am in actionGetNextTag"),'vardump');
		$orderByTag = 'RAND()';
		$orderByPl = 'RAND()';
		$orderByGen = 'RAND()';
		$flagType = Yii::app()->user->getState('flagType');
		if($flagType == 'A'){
			$orderByTag = 'tagname';
			$orderByPl = 'pltitle';
			$orderByGen = 'genrename';
		}
		$criteria=new CDbCriteria();
		$count = 0;
		if($type == "TAG"){
			//$criteria->order='TAGNAME';
			$criteria->order=$orderByTag;
			$count= Yii::app()->user->getState('countTags');
		}
		if($type == "GEN"){
			//$criteria->order='GENRENAME';
			$criteria->order=$orderByGen;
			$count= Yii::app()->user->getState('countGenres');
		}
		if($type == "PL"){
			//$criteria->order='PLTITLE';
			$criteria->order=$orderByPl;
			$count= Yii::app()->user->getState('countPlists');
		}
    	$pages=new CPagination($count);
    	$pages->pageSize=5;
    	if($type == "GEN"){
    		$pages->pageSize=9;
    	}
    	$pages->setCurrentPage($currentPage);
    	$pages->applyLimit($criteria);
    	if($type == "TAG"){
    		$models=Tags::model()->findAll($criteria);
    		foreach($models as $model)
	    	{
	    		$model->imagepath = Utilities::replaceDefaultImage($model->imagepath);
	    	}
			$dataProvider=new CArrayDataProvider($models, array(
				'id'=>'tagid',
				'sort'=>array(
	        		'attributes'=>array(
	             		'tagname',
	        		),
	    		),
			));
			
			$output = CJSON::encode(array('dataProvider'=>$dataProvider));
			//echo Yii::trace(CVarDumper::dumpAsString($output),'vardump');
			echo $output;
    	}
    	if($type=="GEN"){
    		$models=Genres::model()->findAll($criteria);
    		foreach($models as $model)
	    	{
	    		$model->imagepath = Utilities::replaceDefaultImage($model->imagepath);
	    	}
			$dataProvider=new CArrayDataProvider($models, array(
				'id'=>'genreid',
				'sort'=>array(
	        		'attributes'=>array(
	             		'genrename',
	        		),
	    		),
			));
			$output = CJSON::encode(array('dataProvider'=>$dataProvider));
			echo $output;
    	}
    	if($type=="PL"){
    		//echo Yii::trace(CVarDumper::dumpAsString("--------> getNextTag PL"),'vardump');
    		$models=Playlists::model()->findAll($criteria);
    		foreach($models as $model)
	    	{
	    		/*$imgGenStr = "images/stai-music.jpg";
				if(!file_exists ( $model->IMAGEPATH )){
					$model->IMAGEPATH = Yii::app()->request->baseUrl."/".$imgGenStr;	
				}*/
	    		$model->imagepath = Utilities::replaceDefaultImage($model->imagepath);
	    		//echo Yii::trace(CVarDumper::dumpAsString($model->IMAGEPATH),'vardump');
	    	}
			$dataProvider=new CArrayDataProvider($models, array(
				'id'=>'pid',
				'sort'=>array(
	        		'attributes'=>array(
	             		'pltitle',
	        		),
	    		),
			));
			$output = CJSON::encode(array('dataProvider'=>$dataProvider));
			echo $output;
    	}
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}