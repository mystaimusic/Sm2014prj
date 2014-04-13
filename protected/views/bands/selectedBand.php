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
<button type="button" class='search_button2'>Go</button>
<input type="text" class='search_input2'/></div>
<div class="search_text2">Ricerca libera</div>
</div>
<div id="result"></div>
</div>
 <!--mod_mainsearch2-->
	     </div><!--mainsearch2cont-->
   </div>  <!--mainleft_header-->   
        
<div id="mod_contlist">
<div class="header">
<span class="title"><h2>Searched Songs</h2></span></div>
<div id="mainlist"></div><!--mainlist--> 
</div>
<!--mod_contlist--> 
<div class="mainleft_text">
<h1>Radiotags: the STAIMUSIC selection of high quality music!</h1>
<p>Are you tired of listening always the same insipid radios? Are you bored to hear low profile music?
Discover new music, listen selected sounds, get the music to travel you through years and fantastic worlds, get Staimusic to lead you to in the difficult research of your passions.
Follow our playlists and starting from them explore groups, genres, themes, ideas and fashions. The music is not just a pure listening, it’s thinking, it’s history, it’s concepts, it's revolution, it’s a powerful drug that stimulates us in everyday life: enjoy it!.</p>
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
<span class="title"><h2>Our Bands</h2></span></div>
<div id="bandList" class="cont">
    	<?php
    		
    		foreach($bands as $band)
    		{
    			echo CHtml::tag('div', array('class'=>'palinsesto clearfix'), false,false);
    			echo CHtml::link($band['BANDNAME'],'#'.$band['BANDID'], array('class'=>'myplaylist', 'id'=>$band['BANDID']));
    			echo CHtml::closeTag('div');
    		}
    		//echo Yii::trace(CVarDumper::dumpAsString("----------> sono in selectedBands ourbands"),'vardump');
			//echo Yii::trace(CVarDumper::dumpAsString($bandsIdStr),'vardump');
		?>
</div><!--mod_playlists-->	

<div class="suggested_cont">
<div class="suggested_title">Tag suggeriti</div>
<ul class="suggested">
	<?php 
		foreach($tags as $tag)
		{
			echo CHtml::tag('li', array(), false,false);
			//echo CHtml::tag('div', array('class'=>'tag'),trim($tag->TAGNAME),true);
			//echo CHtml::tag('div', array('class'=>'text'),trim($tag->DESCRIPTION),true);
			if(file_exists ( $tag->IMAGEPATH )){
				$imagePath = $tag->IMAGEPATH;
			}else{
				$imagePath = "images/stai-music.jpg";
			}
			$imagePath = Yii::app()->request->baseUrl."/".$imagePath;
			$imghtml = CHtml::image($imagePath);
			echo CHtml::link($imghtml, array('Playlists/viewPlPerTag','id'=>$tag->TAGID));
			echo CHtml::closeTag('li');
		}
	?>

<!--  <li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li> -->
</ul>  <br /><br /><br /><br />


 <div class="suggested_title">Playlist suggerite</div>
<ul class="suggested">
	<?php
		if(isset($plistsOut)){
			foreach($plistsOut as $plist)
			{
				echo CHtml::tag('li',array(),false,false);
				if(file_exists($plist['IMAGEPATH'])){
					$imagePath = $plist['IMAGEPATH'];
				}else{
					$imagePath = "images/stai-music.jpg";
				}
				$imagePath = Yii::app()->request->baseUrl."/".$imagePath;
				$imghtml = CHtml::image($imagePath);
				echo CHtml::link($imghtml,array('Playlists/view2','id'=>$plist['PLID']));
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
				            	oneVideoJSON.id = data.CODE;
				            	oneVideoJSON.title = data.TITLE;
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
                                                oneVideoJSON.id = data.CODE;
                                                oneVideoJSON.title = data.TITLE;
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
