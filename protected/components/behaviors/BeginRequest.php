<?php
class BeginRequest extends CBehavior {
	// The attachEventHandler() mathod attaches an event handler to an event.
	// So: onBeginRequest, the handleBeginRequest() method will be called.
	public function attach($owner) {
		$owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
	}

	public function handleBeginRequest($event) {
		$app = Yii::app();
		$user = $app->user;

		if (isset($_POST['_lang']))
		{
			//$currentUrl = Yii::app()->request->url;
			//$basePath = Yii::app()->basePath;
			if($app->user->hasState('_lang')){
				$oldLang = $app->user->getState('_lang');
				Yii::app()->user->setState('oldLang', $oldLang);
			}
			$app->language = $_POST['_lang'];
			$app->user->setState('_lang', $_POST['_lang']);
			$cookie = new CHttpCookie('_lang', $_POST['_lang']);
			$cookie->expire = time() + (60*60*24*365); // (1 year)
			Yii::app()->request->cookies['_lang'] = $cookie;
			
// 			$newUrl = Utilities::translateUrl($currentUrl, $oldLang);
// 			if($newUrl!=null){
// 				$this->redirect($newUrl);
// 			}
		}
		else if ($app->user->hasState('_lang'))
			$app->language = $app->user->getState('_lang');
		else if(isset(Yii::app()->request->cookies['_lang']))
			$app->language = Yii::app()->request->cookies['_lang']->value;
		else $app->language = 'en_us';
	}
}
