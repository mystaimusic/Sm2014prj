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

}