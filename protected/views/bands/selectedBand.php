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
       			if(isset($genName)){
           			echo $genName; 
				}
       		?>
        </div><!--headertitle-->
       		<?php 
       			if(isset($genDescription)){
       				echo $genDescription;
       			}
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
	echo CHtml::tag('div',array('class'=>'tag'),true);
	if(file_exists ( $genImagePath )){
		//$imgPath = Yii::app()->request->baseUrl."/".$genImagePath;
		$imgPath = $genImagePath;
	}else{
		$imgPath = Yii::app()->request->baseUrl."/images/stai-music.jpg";
	}
	//echo Yii::trace(CVarDumper::dumpAsString($genImagePath),'vardump');
	echo CHtml::image($genImagePath);
?>
<!--  <div class="tag">Rebellion</div><img src="images/rebellion2.jpg" alt="playlist1"></div>  -->
</div><!--mod_playCOVER-->	
<div class="mod_playlists">
<div class="header">
<span class="title"><h2><?php echo Yii::t('msg','SELECTED BANDS')?></h2></span></div>
<div id="bandList" class="cont">
    	<?php
    		
    		foreach($bands as $band)
    		{
    			echo CHtml::tag('div', array('class'=>'palinsesto clearfix'), false,false);
    			echo CHtml::link($band['bandname'],'#'.$band['bandid'], array('class'=>'myplaylist', 'id'=>$band['bandid']));
    			echo CHtml::closeTag('div');
    		}
    		//echo Yii::trace(CVarDumper::dumpAsString("----------> sono in selectedBands ourbands"),'vardump');
			//echo Yii::trace(CVarDumper::dumpAsString($bandsIdStr),'vardump');
		?>
</div><!--mod_playlists-->	

<div class="suggested_cont">
<div class="suggested_title"><?php echo Yii::t('msg','DISCOVER RADIOTAG')?></div>
<ul class="suggested">
	<?php 
		foreach($tags as $tag)
		{
			echo CHtml::tag('li', array(), false,false);
			//echo CHtml::tag('div', array('class'=>'tag'),trim($tag->TAGNAME),true);
			//echo CHtml::tag('div', array('class'=>'text'),trim($tag->DESCRIPTION),true);
			if(file_exists ( $tag->imagepath )){
				$imagePath = $tag->imagepath;
			}else{
				$imagePath = "images/stai-music.jpg";
			}
			$imagePath = Yii::app()->request->baseUrl."/".$imagePath;
			$imghtml = CHtml::image($imagePath);
			$tagLink = Utilities::buildUserFriendlyURL('tag-musica/',$tag->tagname,$tag->tagid);
			echo CHtml::link($imghtml, array($tagLink));
			echo CHtml::closeTag('li');
		}
	?>

<!--  <li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li> -->
</ul>  <br /><br /><br /><br />


 <div class="suggested_title"><?php echo Yii::t('msg','SUGGESTED PLAYLISTS')?></div>
<ul class="suggested">
	<?php
		if(isset($plistsOut)){
			foreach($plistsOut as $plist)
			{
				echo CHtml::tag('li',array(),false,false);
				if(file_exists($plist['imagepath'])){
					$imagePath = $plist['imagepath'];
				}else{
					$imagePath = "images/stai-music.jpg";
				}
				$imagePath = Yii::app()->request->baseUrl."/".$imagePath;
				$imghtml = CHtml::image($imagePath);
				$plistLink = Utilities::buildUserFriendlyURL('playlist-musicali/',$plist['pltitle'],$plist['plid']);
				echo CHtml::link($imghtml,array($plistLink));
				echo CHtml::closeTag('li');
			}
		}
	?>
<!--  <li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li> -->
</ul>     
</div><!--suggested_cont-->



           <!-- <h3>Video suggeriti</h3>
            <div class="sidecont clearfix">
                <div class="sidesection clearfix">
                    <h4><a title="" href="#">Video 1</a></h4>
                    <div class="sidetop">
                        <a class="hoverlink" title="" href="#"><img alt="" src="images/side-1.jpg" /><div class="overlay link"></div></a>
                    </div>
                    <div class="sidebottom">
                        <p>Curabitur tristique tempus purus ...</p>
                    </div>
                </div>
                <div class="sidesection clearfix">
                    <h4><a title="" href="#">Video 2</a></h4>
              <div class="sidetop">
                        <a class="hoverlink" title="" href="#"><img alt="" src="images/side-1.jpg" /><div class="overlay link"></div></a>
                    </div>
                    <div class="sidebottom">
                        <p>Curabitur tristique tempus purus ...</p>
                    </div>
                </div>
		  </div> -->
          
          
          
</div><!--mainright-->





</div><!--maincont-->
</div><!--container-->

	<script type="text/javascript">
	//<![CDATA[

		(function($){

			//alert("ajax");
			var firstBandPlaylist = $(".myplaylist")[0].id;
			var videoJSON_G = new Object();
			var random15 = true;
			
			if(random15==true)
			{
				//alert(random15);
				var outputTitle = "random15";
				//var searchInput = {bandId: 1}; //TODO: change with selected genres
				//genericAjaxCallForSongs(urlStr,inputDataArray,outputTitle);
				var bandsListVar = <?php echo json_encode($bandsIdStr); ?>;
				//alert(bandsListVar);
				$.ajax({
					url: '<?php echo Yii::app()->createUrl('Songs/viewRandomSongsPerBands')?>',
				   	type: "GET",
				    data: {bandsListStr: bandsListVar},
				    dataType: "json",
				    async: false,
				    success: function(response,status, jqXHR)
				    {
				    	if(response){
				            videoJSON_G.title = outputTitle;
				            videoJSON_G.videos = [];
				            $.each(response, function(i, data){
				            	var oneVideoJSON = new Object();
				            	oneVideoJSON.id = data.code;
				            	oneVideoJSON.title = data.title;
				            	videoJSON_G.videos.push(oneVideoJSON);
				            	i++;
				            });
				        }
				    },
				    error: function(data)
				    {
				    	alert("error!!!! "+data);
				    }
				});
			}else{
				//alert(random15);
				$.ajax({
               		//alert("ajax call");
              		url: '<?php echo Yii::app()->createUrl('Songs/viewSongsPerBand')?>',
                   	type: "GET",
                    data: {bandId: firstBandPlaylist},
                    dataType: "json",
                    async: false,
                    success: function(response,status, jqXHR)
                    {
                    	if(response){
                            //alert(jqXHR.responseText);
                            videoJSON_G.title = firstBandPlaylist;
                        	//alert(videoJSON.title);
                            videoJSON_G.videos = [];
                            $.each(response, function(i, data){
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
                });
			}
						
			var playerConfig =  {
					//
				playlist: videoJSON_G,
				//playlist: playlists['playlist-1'], // initial playlist
                onError: function(msg){
					alert(msg);
                },
				onBeforePlaylistLoaded: function(playlist){
					//alert(videoJSON_G);
					$('#loading').show();
				},
				onAfterPlaylistLoaded: function(playlist){
					$('#loading').hide();
				},
				innerPage : "BAND",
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
                                var selector = "#"+selectedPlist;
                                var bandName = $(selector).text();
                                //var bandName = this.text();
                              	$.ajax({
                                    url: '<?php echo Yii::app()->createUrl('Songs/viewSongsPerBand')?>',
                                    type: "GET",
                                    data: {bandId: selectedPlist},
                                    dataType: "json",
                                    async: false,
                                    success: function(response,status, jqXHR)
                                    {
                                        if(response){
                                            //alert(jqXHR.responseText);
                                            var videoJSON = new Object();
                                            videoJSON.title = selectedPlist;
                                            videoJSON.videos = [];
                                            //alert(videoJSON.title);
                                            var count= 0;
                                            $.each(response, function(i, data){
                                                var oneVideoJSON = new Object();
                                                oneVideoJSON.id = data.code;
                                                oneVideoJSON.title = data.title;
                                                videoJSON.videos.push(oneVideoJSON);
                                                count++;
                                            });
                							//alert(count);
                                            if(count < 15){
                								var limit = 15 - count;
                								var keyword = encodeURIComponent(bandName);
                							    var vevoKeyword = 'vevo%20'+keyword;
                							    var yt_url = 'http://gdata.youtube.com/feeds/api/videos?q='+vevoKeyword+'&max-results=30&v=2&alt=jsonc';
                							    $.ajax({
                							    	type: "GET",
                							        url: yt_url,
                							        dataType: "json",
                							        async: false,
                							        success: function(response)
                							        {
                							        	if(response.data.items)
                							            {
                							                $.each(response.data.items, function(i, data){
                    							                //alert(i);
                												var titleUp = data.title.substring(0,2).toUpperCase();
                												var keywordUp = keyword.substring(0,2).toUpperCase();
                												if(titleUp==keywordUp /*&& data.title.search(/full album/i)*/)
                												{
                													//alert("ho trovato");
                							                    	var oneVideoJSON = new Object();
                							                        oneVideoJSON.id = data.id;
                							                        oneVideoJSON.title = data.title;
                							                        videoJSON.videos.push(oneVideoJSON);
                												}
                							                 });
                							            }
                							         }
                							     });
                                            }
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

            $(".search_input2").focus();
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

            //should work for search on youtue, get songs per playlists and get songs per bands {bandId: selectedPlist}
			/*function genericAjaxCallForSongs(urlStr,inputDataArray,outputTitle)
			{
				alert(inputDataArray);
				$.ajax({
					url: urlStr,
					type: "GET",
					data: inputDataArray,
					dataType: "json",
					async: false,
					success: function(response,status, jqXHR)
                    {
                    	if(response){
                            //alert(jqXHR.responseText);
                            videoJSON_G.title = outputTitle;
                        	//alert(videoJSON.title);
                            videoJSON_G.videos = [];
                            $.each(response, function(i, data){
                                    	//alert("data: "+data);
                            	var oneVideoJSON = new Object();
                            	oneVideoJSON.id = data.CODE;
                            	oneVideoJSON.title = data.TITLE;
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
				});
			}*/
		

                        
                        /*function search(e,search_input)
                        {    
                            var keyword = encodeURIComponent(search_input);

                            var yt_url = 'http://gdata.youtube.com/feeds/api/videos?q='+keyword+'&max-results=10&v=2&alt=jsonc';

                            $.ajax(
                            {
                                type: "GET",
                                url: yt_url,
                                dataType: "json",
                                success: function(response)
                                {
                                    if(response.data.items)
                                    {
//                                        alert("called function2");
                                        var videoJSON = new Object();
                                        videoJSON.title = 'SearchResult';
                                        videoJSON.videos = [];
                                        $.each(response.data.items, function(i, data){
											var titleUp = data.title.substring(0,2).toUpperCase();
											var keywordUp = keyword.substring(0,2).toUpperCase();
											if(titleUp==keywordUp ^^)
											{
	                                            var oneVideoJSON = new Object();
	                                            oneVideoJSON.id = data.id;
	                                            oneVideoJSON.title = data.title;
	                                            videoJSON.videos.push(oneVideoJSON);
											}
                                        });
                                        player.player('loadPlaylist', videoJSON);
                                    }
                                }

                            });
                        }*/

		})(this.jQuery);

	//]]>
	</script>
<!--  </body>
</html> -->
