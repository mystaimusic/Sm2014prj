<?php

class TagsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	const C_IL = 'il ';
	const C_LO = 'lo ';
	const C_LA = 'la ';
	const C_I = 'i ';
	const C_GLI = 'gli ';
	const C_LE = 'le ';
	const C_L = 'l\' ';
	const C_L2 = 'l \'';
	const C_L3 = 'l\'';
	const C_THE = 'the ';
	const C_A = 'a ';
	
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
				'actions'=>array('index','view','search','searchRender','parallelSearch'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Tags;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tags']))
		{
			$model->attributes=$_POST['Tags'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->tagid));
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

		if(isset($_POST['Tags']))
		{
			$model->attributes=$_POST['Tags'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->tagid));
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
		/*$dataProvider=new CActiveDataProvider('Tags');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
	}

	public function commonSearch()
	{
		$dataProvider = null;
		if(isset($_GET['tagNameMatch'])){
			$tagNameMatch = $_GET['tagNameMatch'];
			$q = new CDbCriteria();
			$q->addSearchCondition('Tagname', $tagNameMatch);
			$filterTags = Tags::model()->findAll($q);

			foreach($filterTags as $tag)
			{
				if(!file_exists ( $tag->imagepath ))
				{
					$tag->imagepath = "images/stai-music.jpg";	
				}
			}
			
			$dataProvider=new CArrayDataProvider($filterTags, array(
				'id'=>'tagid',
				'sort'=>array(
        			'attributes'=>array(
             			'tagname',
        			),
    			),
			));
		}
		return $dataProvider;
	}
	
	
	public function actionSearchRender()
	{
		//echo Yii::trace(CVarDumper::dumpAsString("------------> I am in actionSearchRenderer"),'vardump');
		//$dataProvider = commonSearch();
		//echo Yii::trace(CVarDumper::dumpAsString($searchField),'vardump');
		
		//$this->render('index',array(
		//	'dataProvider'=>$dataProvider
			//'dataProviderGenres'=>$dataProviderGenres,
			//'dataProviderPlaylist'=>$dataProviderPlaylist,
		//));	
	
	}
	
	public function replaceDefaultImage($dbArray)
	{
		foreach($dbArray as $dbObj){
			if(!file_exists ( $dbObj->imagepath )) {
				$dbObj->imagepath = "images/stai-music.jpg";	
			}
		}
	}	
	
	public function shortPlistTitle($plists)
	{
		foreach($plists as $plist){
			$titleTrimmed = trim($plist->pltitle);
			if(strlen($titleTrimmed)>16){
				$shortTitle = substr($titleTrimmed, 0, 16) . " ...";
			}else{
				$shortTitle = $titleTrimmed; 
			}
			$plist->pltitle = $shortTitle;
		}
	}
	
	public function actionParallelSearch()
	{
		$output='';
		if(isset($_GET['tagNameMatch'])){
			$currLang =Yii::app()->language;
			$langPrefix = Utilities::getLanguagePrefix($currLang);
			//echo Yii::trace(CVarDumper::dumpAsString("-----------> sono in TagsController->actionParallelSearch()"),'vardump');
			try{
				$tagNameMatch = $_GET['tagNameMatch'];
				$articles_it = array (TagsController::C_IL, 
										TagsController::C_LA,
										TagsController::C_I,
										TagsController::C_GLI, 
										TagsController::C_LE,
										TagsController::C_LO,
										TagsController::C_L,
										TagsController::C_L2,
										TagsController::C_L3,
										TagsController::C_THE,
										TagsController::C_A);
				foreach($articles_it as $article){
					$pos = strpos(strtolower($tagNameMatch),$article);
					if($pos !== false ){
						$tagNameMatch = substr($tagNameMatch, $pos+strlen($article));	
					}
				}
				$tagNameMatch = trim($tagNameMatch);
				if($currLang!="en_us"){
					$output = $this->searchByLang($currLang,$tagNameMatch);
					//echo $output;
				}else{
					//tags
					$qTag = new CDbCriteria();
					$qTag->addSearchCondition('Tagname', $tagNameMatch);
					$qTag->order='tagname';
					$filterTags = Tags::model()->findAll($qTag);
					$filterTagsLen = count($filterTags);
					if($filterTagsLen>0 && $filterTagsLen<10){
						$filterTagsLimit = 10 - $filterTagsLen;
						$filterTagsLast = end($filterTags);
						$tagname = $filterTagsLast['tagname'];
						//$sqlOtherTags = mysql_real_escape_string("SELECT * FROM tags WHERE tagname >  '" . $tagname . "' ORDER BY TAGNAME LIMIT 0, ".$filterTagsLimit); //todo check
						//$otherTags =  Yii::app()->db->createCommand($sqlOtherTags)->queryAll();
						$otherTags = Tags::model()->findAll(array(
								'condition'=>'tagname>:tagname',
								'params'=>array(':tagname'=>$tagname),
								'order'=>'tagname',
								'limit'=>$filterTagsLimit,
						));
						$filterTags = array_merge($filterTags, $otherTags);
					}
					//echo Yii::trace(CVarDumper::dumpAsString($filterTags),'vardump');
					$this->replaceDefaultImage($filterTags);
					//translate
					$tagPrefix = Utilities::getUrlPrefixByLang($currLang,"tag");
					foreach($filterTags as $model){
						$model->tagname = "/".$tagPrefix.$model->tagname;
						if($currLang != "en_us"){
							$traslation=TopicTranslations::model()->findByPk(array('id'=>$model->tagid,'lang'=>$currLang,'topic'=>'tag'));
							$model->tagname = "/".$tagPrefix.$traslation->title;
							$model->description = $traslation->description;
						}
					}
					
					//playlists
					$qPlist = new CDbCriteria();
					$qPlist->addSearchCondition('Pltitle',$tagNameMatch);
					$qPlist->order='Pltitle';
					$filterPlist = Playlists::model()->findAll($qPlist);
					$filterPlistLen = count($filterPlist);
					if($filterPlistLen>0 && $filterPlistLen<10){
						$filterPlistLimit = 10 - $filterPlistLen;
						$filterPlistLast = end($filterPlist);
						$plTitle = $filterPlistLast['pltitle'];
						$otherPlists = Playlists::model()->findAll(array(
								'condition'=>'pltitle>:pltitle',
								'params'=>array(':pltitle'=>$plTitle),
								'order'=>'pltitle',
								'limit'=>$filterPlistLimit,
						));
						//echo Yii::trace(CVarDumper::dumpAsString($otherPlists),'vardump');
						$filterPlist = array_merge($filterPlist, $otherPlists);
					}
					//$this->replaceDefaultImage($filterPlist);
					//$this->shortPlistTitle($filterPlist);
					$plPrefix = Utilities::getUrlPrefixByLang($currLang,"playlist");
					foreach($filterPlist as $model){
						$model->pltitle = "/".$plPrefix.$model->pltitle;
						if($currLang != "en_us"){
							$traslation=TopicTranslations::model()->findByPk(array('id'=>$model->plid,'lang'=>$currLang,'topic'=>'playlist'));
							$model->pltitle = "/".$plPrefix.$traslation->title;
							$model->description = $traslation->description;
						}
					}
					//genres
					$qGen = new CDbCriteria();
					$qGen->addSearchCondition('Genrename',$tagNameMatch);
					$qGen->order='Genrename';
					$filterGen = Genres::model()->findAll($qGen);
					$filterGenLen = count($filterGen);
					if($filterGenLen>0 && $filterGenLen<10){
						$filterGenLimit = 10 - $filterGenLen;
						$filterGenLast = end($filterGen);
						$genName = $filterGenLast['genrename'];
						$otherGenres = Genres::model()->findAll(array(
								'condition'=>'genrename>:genrename',
								'params'=>array(':genrename'=>$genName),
								'order'=>'genrename',
								'limit'=>$filterGenLimit,
						));
						$filterGen = array_merge($filterGen, $otherGenres);
					}
					//$this->replaceDefaultImage($filterGen);
					$genPrefix = Utilities::getUrlPrefixByLang($currLang,"genre");
					foreach($filterGen as $model){
						$model->genrename = "/".$genPrefix.$model->genrename;
						if($currLang != "en_us"){
							$traslation=TopicTranslations::model()->findByPk(array('id'=>$model->genid,'lang'=>$currLang,'topic'=>'genre'));
							$model->genrename = "/".$genPrefix.$traslation->title;
							$model->description = $traslation->description;
						}
					}

					//echo Yii::trace(CVarDumper::dumpAsString($filterTags),'vardump');
					$output = CJSON::encode(array('filterTags'=>$filterTags,
												'filterPlist'=>$filterPlist,
												'filterGen'=>$filterGen));
				}
				//echo Yii::trace(CVarDumper::dumpAsString($output),'vardump');
				
			}catch(Exception $e){echo Yii::trace(CVarDumper::dumpAsString($e),'vardump');}
		}
		echo $output;
	}
	
	public function searchByLang($currLang,$tagNameMatch)
	{
		$tagPrefix = Utilities::getUrlPrefixByLang($currLang,"tag");
		$plistPrefix = Utilities::getUrlPrefixByLang($currLang,"playlist");
		$genrePrefix = Utilities::getUrlPrefixByLang($currLang,"genre");
		
		$filterTransTag = $this->searchFromTranslationsByTitle($tagNameMatch,$currLang,"tag");
		$filterTransPlist = $this->searchFromTranslationsByTitle($tagNameMatch,$currLang,"playlist");
		$filterTransGenre = $this->searchFromTranslationsByTitle($tagNameMatch,$currLang,"genre");
		
		$filterTags = array();
		$filterPlist = array();
		$filterGen = array();
		
		foreach($filterTransTag as $translation){
			$recordId = $translation['id'];
			$tagModel = Tags::model()->findByPk($recordId);
			$tagModel->tagname = "/".$tagPrefix.$translation->title;
			$tagModel->description = $translation->description;
			array_push($filterTags,$tagModel);
		}
		foreach($filterTransPlist as $translation){
			$plistModel = Playlists::model()->findByPk($recordId);
			$plistModel->pltitle = "/".$plistPrefix.$translation->title;
			$plistModel->description = $translation->description;
			array_push($filterPlist,$plistModel);
		}
		foreach($filterTransGenre as $translation){
			$genreModel = Genres::model()->findByPk($recordId);
			$genreModel->genrename = "/".$genrePrefix.$translation->title;
			$genreModel->description = $translation->description;
			array_push($filterGen,$genreModel);
		}
		
		$output = CJSON::encode(array('filterTags'=>$filterTags,
				'filterPlist'=>$filterPlist,
				'filterGen'=>$filterGen));
			
		return $output;
	}
	
	public function actionSearch()
	{
		//echo Yii::trace(CVarDumper::dumpAsString("-----------> sono in TagsController->actionSearch()"),'vardump');
		if(isset($_GET['tagNameMatch'])){
			$tagNameMatch = $_GET['tagNameMatch'];
			$q = new CDbCriteria();
			$q->addSearchCondition('Tagname', $tagNameMatch);
			$filterTags = Tags::model()->findAll($q);

			$output = "";
			if(count($filterTags)==0){
				$q = new CDbCriteria();
				$q->addSearchCondition('Pltitle',$tagNameMatch);
				$filterTags = Playlists::model()->findAll($q);
				if(count($filterTags)==0) {
					$q = new CDbCriteria();
					$q->addSearchCondition('Genrename',$tagNameMatch);
					$filterTags = Genres::model()->findAll($q);
					if(count($filterTags)==0){
						return;
					}else{
						foreach($filterTags as $tag) {
							if(!file_exists ( $tag->imagepath )) {
								$tag->imagepath = "images/stai-music.jpg";	
							}
						}
						$dataProvider=new CArrayDataProvider($filterTags, array(
							'id'=>'genreid',
							'sort'=>array(
        					'attributes'=>array(
             					'genrename',
        						),
    						),
						));
						//echo Yii::trace(CVarDumper::dumpAsString("-----------> GENERI"),'vardump');
						//echo Yii::trace(CVarDumper::dumpAsString($dataProvider),'vardump');
						$output = CJSON::encode(array('type'=>'GEN','dataProvider'=>$dataProvider));
					}
				}else{
					foreach($filterTags as $tag) {
						if(!file_exists ( $tag->imagepath )) {
							$tag->imagepath = "images/stai-music.jpg";	
						}
					}
					$dataProvider=new CArrayDataProvider($filterTags, array(
					'id'=>'plid',
					'sort'=>array(
        				'attributes'=>array(
             				'pltitle',
        					),
    					),
					));
					//echo Yii::trace(CVarDumper::dumpAsString("-----------> PLAYLISTS"),'vardump');
					//echo Yii::trace(CVarDumper::dumpAsString($dataProvider),'vardump');
					$output = CJSON::encode(array('type'=>'PL','dataProvider'=>$dataProvider));
				}	
			}else{
				foreach($filterTags as $tag) {
					if(!file_exists ( $tag->imagepath )) {
						$tag->imagepath = "images/stai-music.jpg";	
					}
				}
				$dataProvider=new CArrayDataProvider($filterTags, array(
					'id'=>'tagid',
					'sort'=>array(
        				'attributes'=>array(
             				'tagname',
        				),
    				),
				));
				//echo Yii::trace(CVarDumper::dumpAsString("-----------> TAGS"),'vardump');
				//echo Yii::trace(CVarDumper::dumpAsString($dataProvider),'vardump');
				$output = CJSON::encode(array('type'=>'TAG','dataProvider'=>$dataProvider));
			}
			
			//echo Yii::trace(CVarDumper::dumpAsString("$output"),'vardump');
			//echo Yii::trace(CVarDumper::dumpAsString("-------------> TagsController->actionSearch() HO FINITO"),'vardump');
			echo $output;
			//$this->render('index',array('dataProvider'=>$dataProvider, ));
		}
	}
	
	
	public function searchFromTranslationsByTitle($tagMatch,$currLang,$topic)
	{

		$qTrans = new CDbCriteria();
		$qTrans->addSearchCondition('Title',$tagMatch);
		$qTrans->addSearchCondition('Lang',$currLang);
		$qTrans->addSearchCondition('Topic',$topic);
		$qTrans->order='title';
		$filterTrans = TopicTranslations::model()->findAll($qTrans);
		$filterTransLen = count($filterTrans);
		if($filterTransLen>0 && $filterTransLen<10){
			$filterTransLimit = 10 - $filterTransLen;
			$filterTransLast = end($filterTrans);
			$transTitle = $filterTransLast['title'];
			$otherTrans = TopicTranslations::model()->findAll(array(
					'condition'=>'title>:title and lang=:lang and topic=:topic',
					'params'=>array(':title'=>$transTitle,':lang'=>$currLang,':topic'=>$topic),
					'order'=>'title',
					'limit'=>$filterTransLimit,
			));
			$filterTrans = array_merge($filterTrans, $otherTrans);
		}
		return $filterTrans;		
	}
	
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tags('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tags']))
			$model->attributes=$_GET['Tags'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tags the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tags::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tags $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tags-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
