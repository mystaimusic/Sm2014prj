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
				'actions'=>array('index','view','viewPlPerTag','viewPlPerGenres','view2'),
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
		echo Yii::trace(CVarDumper::dumpAsString("--------> sono in actionView"),'vardump');
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	/**
	 * Displays a particular model passing the id of the playlist to display
	 */
	public function actionView2($id)
	{
		$plist = $this->loadModel($id);
		
		$dataProvider=new CArrayDataProvider($plist, array(
				'id'=>'PLID',
		));
		$pls = $dataProvider->rawData;
		//echo Yii::trace(CVarDumper::dumpAsString("--------> sono in actionView2"),'vardump');
		//echo Yii::trace(CVarDumper::dumpAsString($pls),'vardump');
		$this->render('selectedTag',array(
			'pls' => $pls,
			'imagePath'=>$pls->IMAGEPATH,
			'oneRecord'=>true,
		));
	}

	public function actionViewPlPerTag($tagid,$tagname,$imagePath)
    {
        $tag=Tags::model()->findByPk($tagid);
        $pls=$tag->playlists;
        
		//echo Yii::trace(CVarDumper::dumpAsString($tag),'vardump');
		//echo Yii::trace(CVarDumper::dumpAsString("--------> sono in actionViewPlPerTag"),'vardump');
        //echo Yii::trace(CVarDumper::dumpAsString($pls),'vardump');
		$this->render('selectedTag',array(
			'pls'=>$pls,
			'tagid'=>$tagid,
			'tagname'=>$tagname,
			'imagePath'=>$imagePath,
		));
		
		/*foreach($pls as $pl)
		{
			echo Yii::trace(CVarDumper::dumpAsString($pl),'vardump');
			$this->render('selectedTag', array(
				'pl'=>$pl,
			));
		}*/
    }
    
    public function actionViewPlPerGenres($genid)
    {
    	$genre=Genres::model()->findByPk($genid);
    	$bands=$genre->bands;
    	$songs=$bands->songs; //TODO: check
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
				$this->redirect(array('view','id'=>$model->PLID));
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
				$this->redirect(array('view','id'=>$model->PLID));
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
