<?php

class PlaylistsController extends Controller
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
			array('allow',  // allow all users to perform 'index', 'view' and 'viewPlPerTag' actions
				'actions'=>array('index','view','viewPlPerTag','view2'),
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
		//echo Yii::trace(CVarDumper::dumpAsString("--------> sono in actionView"),'vardump');
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	/**
	 * Displays a particular model passing the id of the playlist to display
	 */
	public function actionView2($id)
	{
		Yii::app()->user->setState('ACTION_CLK', 'PLONE');
		$plist = $this->loadModel($id);
		
		$dataProvider=new CArrayDataProvider($plist, array(
				'id'=>'plid',
		));
		$pls = $dataProvider->rawData;
		//echo Yii::trace(CVarDumper::dumpAsString("--------> sono in actionView2"),'vardump');
		
		$tags = $pls->tags;
		//echo Yii::trace(CVarDumper::dumpAsString($tags[0]->TAGID),'vardump');
		$tagid = $tags[0]->tagid;
		$randSugTags = $this->getRandomSuggestedTags($tagid);
		
		//get random genres
		$randomGenres = $this->getRandomGenres();
		
		$this->render('selectedTag',array(
			'pls' => $pls,
			'suggestedTags'=>$randSugTags,
			'randomGenres'=> $randomGenres,
			'imagePath'=>$pls->imagepath,
			'oneRecord'=>true,
		));
	}

	public function actionViewPlPerTag($id/*,$tagname,$imagePath*/)
    {
    	Yii::app()->user->setState('ACTION_CLK', 'PLTAG');
    	
        $tag=Tags::model()->findByPk($id);
        $tagname=$tag->tagname;
        $imagePath = Utilities::replaceDefaultImage($tag->imagepath);
        echo Yii::trace(CVarDumper::dumpAsString($imagePath),'vardump');
        //$imagePath=$tag->IMAGEPATH;
        $pls=$tag->playlists;
        $genres = $tag->genres;
        $genSize = sizeof($genres);
        if($genSize<5){
        	$genIdArray = array();
        	$limit = 5-$genSize;
        	$count=0;
        	$sql = "select * from genres";
        	if($genSize>0){ 
	        	$sql = $sql . " where genreid not in (";
	        	foreach($genres as $genre){
	        		$genid = $genre['genreid'];
	        		if($count==0){
	        			$tmpVar = $genid;
	        		}else{
	        			$tmpVar = ',' . $genid;
	        		}
	        		$sql=$sql . $tmpVar;
	        		$count++;
	        	}
	        	$sql=$sql . ")";
        	}
        	$sql = $sql . " order by rand() LIMIT 0," . $limit;
			//$command = Yii::app()->db->createCommand($sql);
			$genresExtend = Yii::app()->db->createCommand($sql)->queryAll();
			$genres = array_merge($genres, $genresExtend);	
        }
        //echo Yii::trace(CVarDumper::dumpAsString("--------> sono in actionViewPlPerTag"),'vardump');
		$randSugTags = $this->getRandomSuggestedTags($id);
        
		//echo Yii::trace(CVarDumper::dumpAsString($pls),'vardump');
		$this->render('selectedTag',array(
			'pls'=>$pls,
			'genres'=>$genres,
			'suggestedTags'=>$randSugTags,
			'tagid'=>$id,
			'tagname'=>$tagname,
			'imagePath'=>$imagePath,
		));		
    }
    
    private function getRandomSuggestedTags($tagid){
    	$sqlRandomTags = "SELECT tagid, tagname, description, imagepath FROM tags WHERE tagid NOT IN (:tagid) ORDER BY RAND() LIMIT 0, 5";
		$randSugTags = Tags::model()->findAllBySql($sqlRandomTags, array(':tagid'=>$tagid));
		return $randSugTags;
    }
    
    private function getRandomGenres()
    {
    	$sqlRandomGenres = "SELECT * FROM genres ORDER BY RAND() LIMIT 0, 5";
    	$randomGenres = Genres::model()->findAllBySql($sqlRandomGenres);
    	return $randomGenres;
    }
    
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Playlists;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Playlists']))
		{
			$model->attributes=$_POST['Playlists'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->plid));
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

		if(isset($_POST['Playlists']))
		{
			$model->attributes=$_POST['Playlists'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->plid));
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
		$dataProvider=new CActiveDataProvider('Playlists');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Playlists('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Playlists']))
			$model->attributes=$_GET['Playlists'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Playlists the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Playlists::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Playlists $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='playlists-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
