<?php

class GenresController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

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
				'actions'=>array('index','view','viewBandsPerGenres','viewRandomBandsPerGenres'),
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

	
	public function actionViewBandsPerGenres($genid,$genImagePath,$genDescription)
    {
    	//echo Yii::trace(CVarDumper::dumpAsString("-------------> sono in actionViewSongsPerGenres"),'vardumper');
    	$genre=Genres::model()->findByPk($genid);
    	$bands=$genre->bands;
    	$tags=$genre->tags;
    	$plArray = array();
    	$count = 0;
    	foreach($tags as $tag){
    		$plists=$tag->playlists;
    		$plArray[$count] = $plists[0];
    		$count++; 
    	}
    	//echo Yii::trace(CVarDumper::dumpAsString($plArray),'vardumper');
    	//$songs=$bands->songs;
    	
    	//echo Yii::trace(CVarDumper::dumpAsString("--------> sono in actionViewSongsPerGenres"),'vardump');
    	//echo Yii::trace(CVarDumper::dumpAsString($tags),'vardump');
    	/*foreach($bands as $band)
    	{
    		$bandId = $band->BANDID;
    		$songsModel = Songs::model()->findAllByAttributes(array('BANDID'=>$bandId));
        	echo Yii::trace(CVarDumper::dumpAsString($songsModel),'vardump');
    	}*/
    	
    	$this->render('/bands/selectedBand',array(
			'bands'=>$bands,
    		'tags'=>$tags,
			'fromGenres'=>true,
			'genImagePath'=>$genImagePath,
    		'genDescription'=>$genDescription,
    		'genreId'=>$genid,
		));
    	

    	//echo Yii::trace(CVarDumper::dumpAsString($songs),'vardump');        
    }
    
    public function actionViewRandomBandsPerGenres($genid,$genImagePath,$genDescription)
    {
    	//echo Yii::trace(CVarDumper::dumpAsString("----------> sono in actionViewRandomBandsPerGenres"),'vardump');
    	Yii::app()->user->setState('ACTION_CLK', 'GEN');
    	Yii::app()->user->setState('SELECTED_GENID', $genid);
    	
    	$genre=Genres::model()->findByPk($genid);
    	//echo Yii::trace(CVarDumper::dumpAsString($genre),'vardump');
    	//$bandsDB=$genre->bands;
    	$tags=$genre->tags; //gets suggested tags for the genre
    	$sql = 'SELECT b.* FROM bands as b,bridge_genres_band g WHERE g.gid ='. $genid .' and g.bid = b.bandid ORDER BY RAND() LIMIT 0 , 15'; //the order by rand() works well form max 1000 records
		$bands = Yii::app()->db->createCommand($sql)->queryAll();
		$bandsIdStr='';
		$i = 0;
		foreach($bands as $band) {
			if($i==0){
	    		$bandsIdStr .= $band['BANDID'];
	    	}else{
	    		$tmpVar = ',' . $band['BANDID'];
	    		$bandsIdStr .= $tmpVar;
	    	}
	    	$i++;
		}
    	Yii::app()->user->setState('bandsIdStr', $bandsIdStr);
    	//echo Yii::trace(CVarDumper::dumpAsString($bandsIdStr),'vardump');
    	$plArray = array();
    	$count = 0;
    	
    	//echo Yii::trace(CVarDumper::dumpAsString($tags),'vardump');
    	foreach($tags as $tag){
    		$plists=$tag->playlists;
    		//echo Yii::trace(CVarDumper::dumpAsString($plists),'vardump');
    		$randomId = array_rand($plists);
    		//echo Yii::trace(CVarDumper::dumpAsString($randomId),'vardump');
    		if(!is_null($randomId)){
    			$plArray[$count] = $plists[$randomId];
    			$count++;
    		}
    	}
    	//echo Yii::trace(CVarDumper::dumpAsString($plArray),'vardump');
		$this->render('/bands/selectedBand',array(
			'bands'=>$bands,
    		'tags'=>$tags,
			'plistsOut'=>$plArray,
			'fromGenres'=>true,
			'genImagePath'=>$genImagePath,
    		'genDescription'=>$genDescription,
    		'genreId'=>$genid,
			'bandsIdStr'=>$bandsIdStr,
		));
    }
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Genres;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Genres']))
		{
			$model->attributes=$_POST['Genres'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->GENREID));
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

		if(isset($_POST['Genres']))
		{
			$model->attributes=$_POST['Genres'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->GENREID));
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
		$dataProvider=new CActiveDataProvider('Genres');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Genres('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Genres']))
			$model->attributes=$_GET['Genres'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Genres the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Genres::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Genres $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='genres-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
