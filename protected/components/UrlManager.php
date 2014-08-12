<?php
class UrlManager extends CUrlManager
{
	public function createUrl($route,$params=array(),$ampersand='&')
	{
// 		if (!isset($params['_lang'])) {
// 			if (Yii::app()->user->hasState('_lang'))
// 				Yii::app()->language = Yii::app()->user->getState('_lang');
// 			else if(isset(Yii::app()->request->cookies['_lang']))
// 				Yii::app()->language = Yii::app()->request->cookies['_lang']->value;
// 			$params['_lang']=Yii::app()->language;
// 		}
		if($route=='/'){
			$route=$route.substr(Yii::app()->language,0,2);
		}
		return parent::createUrl($route, $params, $ampersand);
	}
}
?>