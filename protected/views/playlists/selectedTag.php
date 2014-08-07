
<!--  <div class="container darkbg">
  <div id="headercont">

<div id="mod_mainsearch">
<div id="search" class="header-answer">What makes your body move...and your heart beat?</div>
<div class="header-form">
	<form id="search_tags" action="<?php echo Yii::app()->createUrl('Tags/searchRender') ?>">
		<input type="text" class='search_input'/><button type="button" class='search_button'>Go</button>
	</form>
</div>


</div><br><br>

  </div>
</div>-->
<div class="container  darkbg2">
<div id="midcont">

</div><!--midcont-->
</div><!--container2-->
<div class="container">
	<div id="maincont" class="clearfix">
<div id="mainleft">
   <div id="mainleft_header">
         <div id="headervideo_cont">
		<div id="headervideo">
				<div class="youtube-player">
					<div class="youtube-player-video">
					<div class="youtube-player-object">
					<!--  You need Flash player 8+ and JavaScript enabled to view this video. -->					
					</div>
				</div>
				</div><!--youtubeplayer-->		
        </div><!--headervideo--> 
        </div><!--headervideo_cont--> 

       	<div id="headertext">
       		<div id="headertitle">
           		<?php 
       				/*if((isset($oneRecord) && $oneRecord === true))
       				{
						echo $pls->PLTITLE;
       				}*/
       			?>
        	</div><!--headertitle-->
       			<?php 
       				/*if((isset($oneRecord) && $oneRecord === true))
       				{
       					echo $pls->DESCRIPTION;
       				}*/
       			?>
       	</div><!--headertext-->    

 <div id="player_toolbar">
	     </div><!--player_toolbar-->
      
         <div id="mainsearch2_cont">

 <div id="mod_mainsearch2">
<div id="loading" style="margin: 4px 0;display:none;">loading...</div>

<div class="search_box"> 
<div id="search">
<button type="button" class='search_button2'><?php echo Yii::t('msg','Find')?></button>
<input type="text" class='search_input2'/></div>
<div class="search_text2"><?php echo Yii::t('msg','WHICH IS YOUR FAVORITE BAND?')?></div>
</div>

<div id="result"></div>
</div>
 <!--mod_mainsearch2-->
	     </div><!--mainsearch2cont-->
   </div>  <!--mainleft_header-->   
<div id="mod_contlist">
<div class="header">
<span class="title"><h2><?php echo Yii::t('msg','ON AIR - PROGRAMMING')?></h2></span></div>
<div id="mainlist"></div><!--mainlist--> 
</div>
<!--mod_contlist--> 

<div class="mainleft_text">
<h1><?php echo Yii::t('msg','STAIMUSIC, an easy way to discover music:')?></h1>
<p>- <?php echo Yii::t('msg','You can click on a TAG to generate a continuos flux of related music')?></p>
<p>- <?php echo Yii::t('msg','You can click on a PLAYLIST to find out a particolar point of view over the music evolution')?></p>
<p>- <?php echo Yii::t('msg','You can click on a GENRE to listen to the most important songs that have conditioned that genre')?></p>
<p>- <?php echo Yii::t('msg','If you have any suggestions about our musical choices, if you want to correct some errors, if you want to discuss about music, if you want to propose us a new playlist, please contact us!')?></p>

</div><!--mainleft-->		
            
</div><!--mainleft-->




<div id="mainright">
<div class="mod_playCOVER">
<?php
	//display playlists
	$currLang = Yii::app()->language;
	if((!isset($tagname) || trim($tagname)==='')){
		$title = $pls->pltitle;
		$description = $pls->description;
		if($currLang!="en_us"){
			$traslation=TopicTranslations::model()->findByPk(array('id'=>$pls->plid,'lang'=>$currLang,'topic'=>'playlist'));
			$title = $traslation->title;
			$description = $traslation->description;
		}

		if(strlen($title)>16){
			$shortTitle = substr($title, 0, 16) . " ...";
		}else{
			$shortTitle = $title;
		}
		echo CHtml::tag('div',array('class'=>'tag'),$shortTitle,true);
		$imgPath = Utilities::replaceDefaultImage($pls->imagepath);
		/*if(!is_null($pls->IMAGEPATH) && !empty($pls->IMAGEPATH) && file_exists ( $pls->IMAGEPATH )){
			$imgPath = $pls->IMAGEPATH;
		}else{
			$imgPath = "images/stai-music.jpg";
		}
		$imgPath = Yii::app()->request->baseUrl."/".$imgPath;*/
		echo CHtml::image($imgPath);
	} 
	else{
		$title = $tagname;
		if($currLang!="en_us"){
			$traslation=TopicTranslations::model()->findByPk(array('id'=>$tagid,'lang'=>$currLang,'topic'=>'tag'));
			$title = $traslation->title;
		}
		echo CHtml::tag('div',array('class'=>'tag'),$title,true);
		//$imgPath = Utilities::replaceDefaultImage($pls->IMAGEPATH);
		//$imagePath = Yii::app()->request->baseUrl."/".$imagePath;
		echo CHtml::image($imagePath);
	}
	
?>
</div><!--mod_playCOVER-->	
<div class="mod_playlists">
<div class="header">
<span class="title"><h2><?php echo Yii::t('msg','SUGGESTED PLAYLISTS')?></h2></span></div>
<div class="cont">
    	<?php 
    		
    		if(isset($fromGenres) && $fromGenres==true)
    		{//display bands
    			foreach($bands as $band)
    			{
    				echo CHtml::tag('div', array('class'=>'palinsesto clearfix'), false,false);
    				echo CHtml::link($band->bandname,'#'.$band->bandid, array('class'=>'myplaylist', 'id'=>$band->bandid));	
    				echo CHtml::closeTag('div');
    			}	
    		}
    		else
    		{//display playlists
	    		if((!isset($oneRecord)|| $oneRecord === false))
	    		{
	    			foreach($pls as $pl)
	    			{
	    				echo CHtml::tag('div', array('class'=>'palinsesto clearfix'),false,false);	
	    				echo CHtml::link($pl->pltitle,'#'.$pl->plref, array('class' => 'myplaylist', 'id' =>$pl->plid ) );
	    				echo CHtml::closeTag('div');
	    			}
	    		}else{
	    			echo CHtml::tag('div', array('class'=>'palinsesto clearfix'),false,false);	
	    			echo CHtml::link($pls->pltitle,'#'.$pls->plref, array('class' => 'myplaylist', 'id' =>$pls->plid ) );
	    			echo CHtml::closeTag('div');
	    		}
    		}
    	
			//echo Yii::trace(CVarDumper::dumpAsString($pls),'vardump');
			
			//Yii::app()->createUrl('Songs/viewSongsPerPlist');
			
		?>        
</div><!--mod_playlists-->	

<div class="suggested_cont">
<div class="suggested_title"><?php echo Yii::t('msg','LISTEN TO THE RELATED GENRES')?></div>
<ul class="suggested">
	<?php 
		if(isset($genres)){
			foreach($genres as $genre)
			{
				echo CHtml::tag('li',array(),false,false);
				$imgPathDB = '';
				$genIdDB = '';
				$genDescDB = '';
				if(is_array($genre)){
					$imgPathDB = $genre['imagepath'];
					$genIdDB = $genre['genreid'];
					$genDescDB = $genre['description'];	
				}else{
					$imgPathDB = $genre->imagepath;
					$genIdDB = $genre->genreid;
					$genDescDB = $genre->description;
				}
				$imgGenStr = "images/stai-music.jpg";
				if(file_exists ( $imgPathDB )){
					$imgGenStr = $imgPathDB;
				}
				//$imgGenStr = Utilities::replaceDefaultImage($imgPathDB);
				$imgGenStr = Yii::app()->request->baseUrl."/".$imgGenStr;
				$imgGenHtml = CHtml::image($imgGenStr);
				$genLink = Utilities::buildUserFriendlyURL('generi-musicali/',$genre['genrename'],$genre['genreid']);
				echo CHtml::link($imgGenHtml, array($genLink));
				echo CHtml::closeTag('li');
			}
		}else if(isset($randomGenres)){
			foreach($randomGenres as $randomGenre ){
				echo CHtml::tag('li',array(),false,false);
				$imgGenStr = "images/stai-music.jpg";
				if(file_exists ( $randomGenre['imagepath'] )){
					$imgGenStr = $randomGenre['imagepath'];
				}
				//$imgGenStr = Utilities::replaceDefaultImage($randomGenre['IMAGEPATH']);
				$imgGenStr = Yii::app()->request->baseUrl."/".$imgGenStr;
				$imgGenHtml = CHtml::image($imgGenStr);
				$genLink = Utilities::buildUserFriendlyURL('generi-musicali/',$randomGenre['genrename'],$randomGenre['genreid']);
				echo CHtml::link($imgGenHtml, array($genLink));
				echo CHtml::closeTag('li');
			}
			
		}
	?>
</ul>  <br /><br /><br />


 <div class="suggested_title"><?php echo Yii::t('msg','DISCOVER RADIOTAG')?></div>
<ul class="suggested">
	<?php 
		if(isset($suggestedTags) && count($suggestedTags)){
			foreach($suggestedTags as $sugTag){
				echo CHtml::tag('li',array(),false,false);		
				if(file_exists ( $sugTag['imagepath'] )){
					$imagePath = $sugTag['imagepath'];
				}else{
					$imagePath = "images/stai-music.jpg";
				}
				//echo Yii::trace(CVarDumper::dumpAsString($sugTag['IMAGEPATH']),'vardump');
				//$imagePath = Utilities::replaceDefaultImage($sugTag['IMAGEPATH']);
				$imagePath = Yii::app()->request->baseUrl."/".$imagePath;
				$imghtml = CHtml::image($imagePath);
				$tagLink = Utilities::buildUserFriendlyURL('tag-musica/',$sugTag['tagname'],$sugTag['tagid']);
				echo CHtml::link($imghtml, array($tagLink));
				//echo CHtml::link($imghtml, array('Playlists/viewPlPerTag','id'=>$sugTag['TAGID']));
				echo CHtml::closeTag('li');
			}
		}
	?>
</ul>     
</div><!--suggested_cont-->
</div><!--mainright-->
</div><!--maincont-->
</div><!--container-->

	<script type="text/javascript">
	//<![CDATA[

		(function($){

			var firstPlaylist = $(".myplaylist")[0].id;
			//alert("firstPlaylist: "+firstPlaylist);
			var videoJSON_G = new Object();
			$.ajax(
           		{
               		//alert("ajax call");
              		url: '<?php echo Yii::app()->createUrl('Songs/viewSongsPerPlist')?>',
                   	type: "GET",
                    data: {playlistId: firstPlaylist},
                    dataType: "json",
                    async: false,
                    success: function(response,status, jqXHR)
                    {
                    	if(response){
                            //alert(jqXHR.responseText);
                            videoJSON_G.title = firstPlaylist;
                        	//alert(videoJSON.title);
                            videoJSON_G.videos = [];
                            //$("#headertext").empty();
                            var html = "<div id='headertitle'>"+response.title+"</div>"+response.description;
                            $("#headertext").append(html);
                            $.each(response.songs, function(i, data){
                                    	//alert("data: "+data);
                            	var oneVideoJSON = new Object();
                            	oneVideoJSON.id = data.code;
                            	oneVideoJSON.title = data.title;
                            	videoJSON_G.videos.push(oneVideoJSON);
                            	//alert(oneVideoJSON.id + "     " +oneVideoJSON.title);
                                	//player.player('loadPlaylist', videoJSON);
                            });
                        }
                    },
                    error: function(data)
                    {
                    	alert("error!!!! "+data);
                    }
                }    
           	);
			
			var playerConfig =  {
					//
					playlist: videoJSON_G,
				//playlist: playlists['playlist-1'], // initial playlist
                                onError: function(msg){

					alert(msg);
                                },
				onBeforePlaylistLoaded: function(playlist){

					$('#loading').show();
				},
				onAfterPlaylistLoaded: function(playlist){

					//alert("onAfterPlaylistLoaded");
					$('#loading').hide();
					//self.elements.playlist.children(":first").trigger("click");
				},
				innerPage : "TAG",
			};
		
			var player = $('.youtube-player').player( playerConfig );
			//var player = $('.youtube-player').player( 'loadPlaylist', videoJSON );
//                        $(".myplaylist").click(function(){
//                            alert("click: "+this.id);
//                        });

			//$('.playlists a[href*=#]').click(function(){
                        $(".myplaylist").click(function(){
                                //TODO: replace with ajax call to the php function
                              //var playlist = playlists[ this.hash.replace(/^.*?#/, '') ];
                                //alert('click ' +playlist.videos[0].id);
                                var selectedPlist = this.id;
                              	//alert('click ' +selectedPlist);
                                $.ajax({
                                    url: '<?php echo Yii::app()->createUrl('Songs/viewSongsPerPlist')?>',
                                    type: "GET",
                                    data: {playlistId: selectedPlist},
                                    dataType: "json",
                                    async: false,
                                    success: function(response,status, jqXHR){
                                        if(response){
                                            var videoJSON = new Object();
                                            //videoJSON.title = selectedPlist;
                                            videoJSON.title = response.title;
                                            videoJSON.videos = [];
                                            $("#headertext").empty();
                                            var html = "<div id='headertitle'>"+response.title+"</div>"+response.description;
                                            $("#headertext").append(html);
                                            $.each(response.songs, function(i, data){
                                                var oneVideoJSON = new Object();
                                                //alert(data);
                                                oneVideoJSON.id = data.code;
                                                oneVideoJSON.title = data.title;
                                                videoJSON.videos.push(oneVideoJSON);
                                            });
                                            player.player('loadPlaylist', videoJSON);
                                        }
                                    },
                                    error: function(data)
                                    {
                                        alert("error!!!! "+data);
                                    }
                                });
                                
				//player.player('loadPlaylist', playlist);

				return false;
			});

            $("#search_tags").submit(function( event ) {
           		alert( "Handler for .submit() called." );
            	event.preventDefault();
           	});
           	
                        
			$(".search_input").focus();
            //$(".search_input2").focus();
            $(".search_input2").bind("enterKey",function(e)
            {
            	search(e,$(this).val(),player);
            });

			$(".search_input2").keyup(function(e){
				if(e.keyCode == 13)
				{
					$(this).trigger("enterKey");
				}
			});
                        
            $(".search_button2").click(function(e)
            {
           		search(e,$(".search_input2").val(),player);
            });
		})(this.jQuery);

	//]]>
	</script>
<!--  </body>
</html> -->
