<?php

class Utilities{

	public static function replaceDefaultImage($_imgInput)
	{
		$imagePath = "images/stai-music.jpg";
		//echo Yii::trace(CVarDumper::dumpAsString($_imgInput),'vardump');
		if(file_exists ( $_imgInput )){
			$imagePath = $_imgInput;
		}
		$imagePath2 = Yii::app()->request->baseUrl."/".$imagePath;
		//echo Yii::trace(CVarDumper::dumpAsString($imagePath2),'vardump');
		//echo Yii::trace(CVarDumper::dumpAsString(Yii::app()->request->baseUrl),'vardump');
		return $imagePath2;
	}
	
	public static function replaceDefaultImageArray($_imgInputArray)
	{
		foreach( $_imgInputArray as $_imgInput){
			$_tmpImagePath = Utilities::replaceDefaultImage($_imgInput['imagepath']);
		}
	}
	
	public static function buildUserFriendlyURL($prefix, $title, $id)
	{
		$tagNameRepl = str_replace(array(' ','\''),"-",$title);
		$tagNameRepl2 = str_replace(array(',',';',':','.','!','?','%'),"",$tagNameRepl);
		$tagLink = $prefix.$tagNameRepl2.'_'. $id.'.html';
		return strtolower($tagLink); 
	}
	public static function buildUserFriendlyURLPlist($prefix,$title,$id)
	{
		$tagNameRepl = str_replace(" ","-",$title);
		$tagNameRepl2 = str_replace("'","-",$tagNameRepl);
		$tagLink = $prefix.$id.'-'.$tagNameRepl2 .'.html';
		return strtolower($tagLink);
	}
	
	public static function replaceWithDashes($title){
		$tagNameRepl = str_replace(" ","-",$title);
		$tagNameRepl2 = str_replace("'","-",$tagNameRepl);
		$tagNameRepl3 = str_replace(array(' ','\''),"-",$tagNameRepl2);
		$tagNameRepl4 = str_replace(array(',',';',':','.','!','?','%'),"",$tagNameRepl3);
		return $tagNameRepl4;
	}
	
	public static function getTagUrl($title,$id)
	{
		$tagUrl = Utilities::getCustomUrl("musica/tag/",$title,$id);
		//echo Yii::trace(CVarDumper::dumpAsString($tagUrl),'vardump');
		return $tagUrl;
	}
	
	public static function getPlaylistUrl($title,$id)
	{
		return Utilities::getCustomUrl("musica/playlist/",$title,$id);
	}
	
	public static function getCustomUrl($prefix,$title,$id)
	{
		$customTag = Yii::app()->createUrl($prefix,array('title'=>$title,'id'=>$id));
		//echo Yii::trace(CVarDumper::dumpAsString($customTag),'vardump');
		return $customTag;
	}
	
	public static function getLanguagePrefix($currLang)
	{
		return substr($currLang, 0,2);
	}
	
	public static function getUrlPrefixByLang($currLang,$topic)
	{
		$langPrefix = Utilities::getLanguagePrefix($currLang);
		if($langPrefix=="it" && $topic=="tag"){
			return "it/tag-musica/";
		}else if($langPrefix=="it" && $topic=="playlist"){
			return "it/playlist-musicali/";
		}else if($langPrefix=="it" && $topic=="genre"){
			return "it/generi-musicali/";
		}else if(($langPrefix=="en" || $langPrefix=="es") && $topic=="tag"){
			return $langPrefix."/tags/";
		}else if(($langPrefix=="en" || $langPrefix=="es") && $topic=="playlist"){
			return $langPrefix."/playlists/";
		}else if($langPrefix=="en" && $topic=="genre"){
			return "en/music-genres/";
		}else if($langPrefix=="es" && $topic=="genre"){
			return "es/genreros-musicales/";
		}else return null;
	}
	
	public static function translateUrl($url, $oldLang)
	{
		$oldLangPrefix = Utilities::getLanguagePrefix($oldLang);
		if(!strpos($url,$oldLangPrefix)){
			return null;
		}
		$urlPrefix = current(explode("/".$oldLangPrefix."/",$url));
		
		$currLang = Yii::app()->language;
		//$currLangPrefix = getLanguagePrefix($currLang);
		$usArray = explode("_",$url);
		$idToken = $usArray[1];
		$id = current(explode(".",$idToken));
		
		$topic = null;
		if($oldLang=="en_us" || $oldLang=="es_es")
		{
			$topicPos = strpos($url,"tag");
			if(!$topicPos){
				$topicPos = strpos($url,"playlists");
				if(!$topicPos){
					if($oldLang=="en_us"){
						$topicPos = strpos($url,"music-genres");
					}else{
						$topicPos = strpos($url,"genreros-musicales");
					}
					if($topicPos){
						$topic = "genre";
					}
				}else{
					$topic = "playlist";
				}
			}else{
				$topic = "tag";
			}
		}else{
			$topicPos = strpos($url,"tag-musica");
			if(!$topicPos){
				$topicPos = strpos($url,"playlist-musicali");
				if(!$topicPos){
					$topicPos = strpos($url,"generi-musicali");
					if($topicPos){
						$topic = "genre";
					}
				}else{
					$topic = "playlist";
				}
			}else{
				$topic = "tag";
			}
		}
		$newUrl = null;
		$title = null;
		if($currLang!="en_us"){
			$traslation=TopicTranslations::model()->findByPk(array('id'=>$id,'lang'=>$currLang,'topic'=>$topic));
			if($traslation!=null){
				$title = $traslation->title;
			}
		}else{
			if($topic=="tag"){
				$tagModel = Tags::model()->findByPk($id);
				if($tagModel!=null){
					$title = $tagModel->tagname;
				}
			}else if($topic=="playlist"){
				$plistModel = Playlists::model()->findByPk($id);
				if($plistModel!=null){
					$title = $plistModel->pltitle;
				}
			}else if($topic=="genre"){
				$genreModel = Genres::model()->findByPk($id);
				if($genreModel!=null){
					$title = $genreModel->genrename;
				}
			}
		}
		if($title!=null){
			$titleUrlLike = Utilities::replaceWithDashes($title);
			$prefix = Utilities::getUrlPrefixByLang($currLang,$topic);
			$newUrlPostFix = $prefix.$titleUrlLike."_".$id.".html";
			$newUrl = $urlPrefix."/".$newUrlPostFix;
			return $newUrl;
		}else{
			return null;
		}
	}
}