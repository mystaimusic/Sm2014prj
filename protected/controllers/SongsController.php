<?php

class SongsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','viewSongsPerPlist','viewSongsPerBand','viewRandomSongsPerBands','viewBandsSongsPerGenres'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionViewSongsPerPlist($playlistId)
	{
		$playlist=Playlists::model()->findByPk($playlistId);
        $songs = $playlist->songs;

        $output = CJSON::encode($songs);
		//echo Yii::trace(CVarDumper::dumpAsString("sono in actionViewSongsPerPlaylist"),'vardump');
        
        echo $output;
		//echo Yii::trace(CVarDumper::dumpAsString($playlist),'vardump');
		/*foreach($songs as $song){
        	$this->render('selectedTag',array(
            	'song'=>$song,
        	));
		}*/
	}
	
	//this is an ajaxcall
	public function actionViewSongsPerBand($bandId)
	{
		$songsModel = Songs::model()->findAllByAttributes(array('BANDID'=>$bandId));
       	//echo Yii::trace(CVarDumper::dumpAsString($songsModel),'vardump');
		
		//$playlist=Playlists::model()->findByPk($bandId);
        //$songs = $playlist->songs;

        $output = CJSON::encode($songsModel);
		//echo Yii::trace(CVarDumper::dumpAsString("----------> sono in actionViewSongsPerBand"),'vardump');
		//echo Yii::trace(CVarDumper::dumpAsString($output),'vardump');
        
        echo $output;
		//echo Yii::trace(CVarDumper::dumpAsString($playlist),'vardump');
		/*foreach($songs as $song){
        	$this->render('selectedTag',array(
            	'song'=>$song,
        	));
		}*/
	}
	
	//this is an ajaxcall: the input is a genresid in this case
	public function actionViewBandsSongsPerGenres($playlistId)
	{
		echo Yii::trace(CVarDumper::dumpAsString("----------> sono in actionViewBandsSongsPerGenres"),'vardump');
		$bandsIdStr = Yii::app()->user->getState('bandsIdStr');
		$sql = 'SELECT * FROM bands WHERE bandid NOT IN ('. $bandsIdStr .') LIMIT 0 , 15';
		$bands = Yii::app()->db->createCommand($sql)->queryAll();
		$songsArray = array();
		//echo Yii::trace(CVarDumper::dumpAsString($bands),'vardump');
		foreach($bands as $band) {
			$bandId = $band['BANDID'];
			$bandName = $band['BANDNAME'];
			$songModel = Songs::model()->findByAttributes(array('BANDID'=>$bandId));
			//echo Yii::trace(CVarDumper::dumpAsString($songModel),'vardump');
			$songModel->TITLE = $bandName . ' - ' . $songModel->TITLE;
			echo Yii::trace(CVarDumper::dumpAsString($songModel->TITLE),'vardump'); 
			$songsArray[$bandName]=$songModel;			
			$tmpVar = ',' . $bandId;
			$bandsIdStr .= $tmpVar;
		}
		Yii::app()->user->setState('bandsIdStr', $bandsIdStr);
		$output = CJSON::encode($songsArray);
		echo Yii::trace(CVarDumper::dumpAsString($output),'vardump');
		echo $output;
	}
	
	//this is an ajaxcall
	public function actionViewRandomSongsPerBands($bandsListStr)
	{
		//echo Yii::trace(CVarDumper::dumpAsString($bandsList),'vardump');
		//$genre=Genres::model()->findByPk($genreId);
		//extracts 15 random bands
		$bandsIdList = explode(',',$bandsListStr);
		//echo Yii::trace(CVarDumper::dumpAsString($bandsIdList),'vardump');
		//$bands=$genre->bands;
    	$max = Songs::model()->count();
		$songsArray = array();
    	$count = 0;
    	
    	foreach($bandsIdList as $bandId)
    	{
    		//echo Yii::trace(CVarDumper::dumpAsString($bandId),'vardump');
    		$offset = rand(0,$max);
    		$songModel = Songs::model()->findByAttributes(array('BANDID'=>$bandId));
    		$bandModel = Bands::model()->findByPk($bandId);
    		$bandName = $bandModel->BANDNAME;
    		$songModel->TITLE = $bandName . ' - ' . $songModel->TITLE;
    		//echo Yii::trace(CVarDumper::dumpAsString($songModel),'vardump');
    		//$songsArray[$count] = $song;
    		//$songsModel = Songs::model()->findAllByAttributes(array('BANDID'=>$bandId));
    		//$criteria = new CDbCriteria();
    		//extracts 1 random song from each random band
    		//$songModel = Songs::model()->findAll($bandId,array(
    		//	'select'=>'*, rand() as rand',
    		//	'limit'=>1,
    		//	'order'=>'rand',
    		//));
    		//echo Yii::trace(CVarDumper::dumpAsString($songModel),'vardump');
    		//array_push($songsArray,$count,$songModel);
    		$songsArray[$count]=$songModel;
    		$count++;
    	}
    	
    	//echo Yii::trace(CVarDumper::dumpAsString($songsArray),'vardump');
    	$output = CJSON::encode($songsArray);
    	//echo Yii::trace(CVarDumper::dumpAsString($output),'vardump');
    	echo $output;
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Songs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Songs']))
		{
			$model->attributes=$_POST['Songs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->SONGID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Songs']))
		{
			$model->attributes=$_POST['Songs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->SONGID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Songs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Songs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Songs']))
			$model->attributes=$_GET['Songs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Songs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Songs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Songs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='songs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
