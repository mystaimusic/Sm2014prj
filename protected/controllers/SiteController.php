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
		/*
		echo Yii::trace(CVarDumper::dumpAsString("--------> sono in SiteController.actionIndex"),'vardump');
		echo Yii::trace(CVarDumper::dumpAsString($models),'vardump');*/
		
		//TODO: mettere in sessione il contatore del numero di tags. playlists e generi totali
		$countTags = Tags::model()->count();
		$countPlists = Playlists::model()->count();
		$countGenres = Genres::model()->count();
		Yii::app()->user->setState('countTags', $countTags);
		Yii::app()->user->setState('countPlists', $countPlists);
		Yii::app()->user->setState('countGenres', $countGenres);
		
		$dataProvider=new CActiveDataProvider('Tags',
			array(
				'criteria'=>array(
        			'order'=>'TAGNAME',
    			),
    			'pagination'=>array(
        			'pageSize'=>10, // or another reasonable high value...
    			),
			)
		);
		//echo Yii::trace(CVarDumper::dumpAsString("--------> sono in SiteController.actionIndex 2"),'vardump');
		//echo Yii::trace(CVarDumper::dumpAsString($dataProvider->getData()),'vardump');
		$dataProviderPlaylist = new CActiveDataProvider('Playlists',
			array(
				'criteria'=>array(
					'order'=>'PLID',
				),
				'pagination'=>array(
        			'pageSize'=>10,
    			),
			)
		);
		
		$dataProviderGenres = new CActiveDataProvider('Genres',
			array(
				'criteria'=>array(
					'order'=>'GENREID',	
				),
				'pagination'=>array('pageSize'=>1000),
			)
		);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'dataProviderGenres'=>$dataProviderGenres,
			'dataProviderPlaylist'=>$dataProviderPlaylist,
		));
		//$this->render('index');
	}

	public function actionSearch($queryString)
	{
		
	}
	
	//this is an ajax call
	public function actionGetNextTag($currentPage,$type)
	{
		$criteria=new CDbCriteria();
		$count = 0;
		if($type == "TAG"){
			$criteria->order='TAGNAME';
			//$count=Tags::model()->count($criteria);
			$count= Yii::app()->user->getState('countTags');
		}
		if($type == "GEN"){
			$criteria->order='GENRENAME';
			//$count=Genres::model()->count($criteria);
			$count= Yii::app()->user->getState('countGenres');
		}
		if($type == "PL"){
			$criteria->order='PLTITLE';
			//$count=Playlists::model()->count($criteria);
			$count= Yii::app()->user->getState('countPlists');
		}
    	$pages=new CPagination($count);
    	$pages->pageSize=5;
    	$pages->setCurrentPage($currentPage);
    	$pages->applyLimit($criteria);
    	if($type == "TAG"){
    		$models=Tags::model()->findAll($criteria);
    		foreach($models as $model)
	    	{
	    		$imgGenStr = "images/stai-music.jpg";
				if(!file_exists ( $model->IMAGEPATH )){
					$model->IMAGEPATH = $imgGenStr;	
				}
	    	}
			$dataProvider=new CArrayDataProvider($models, array(
				'id'=>'TAGID',
				'sort'=>array(
	        		'attributes'=>array(
	             		'TAGNAME',
	        		),
	    		),
			));
			$output = CJSON::encode(array('dataProvider'=>$dataProvider));
			echo $output;
    	}
    	if($type=="GEN"){
    		$models=Genres::model()->findAll($criteria);
    		foreach($models as $model)
	    	{
	    		$imgGenStr = "images/stai-music.jpg";
				if(!file_exists ( $model->IMAGEPATH )){
					$model->IMAGEPATH = $imgGenStr;	
				}
	    	}
			$dataProvider=new CArrayDataProvider($models, array(
				'id'=>'GENREID',
				'sort'=>array(
	        		'attributes'=>array(
	             		'GENRENAME',
	        		),
	    		),
			));
			$output = CJSON::encode(array('dataProvider'=>$dataProvider));
			echo $output;
    	}
    	if($type=="PL"){
    		$models=Playlists::model()->findAll($criteria);
    		foreach($models as $model)
	    	{
	    		$imgGenStr = "images/stai-music.jpg";
				if(!file_exists ( $model->IMAGEPATH )){
					$model->IMAGEPATH = $imgGenStr;	
				}
	    	}
			$dataProvider=new CArrayDataProvider($models, array(
				'id'=>'PID',
				'sort'=>array(
	        		'attributes'=>array(
	             		'PLTITLE',
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