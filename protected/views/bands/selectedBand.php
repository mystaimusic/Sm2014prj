<!--  <!DOCTYPE html>
<html>
<head>
<title>Website Name Here</title>
<meta charset="UTF-8">

<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link rel="stylesheet" href="css/style.css">
	<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/black-tie/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans&amp;subset=latin" />
	<link type="text/css" rel="stylesheet" href="css/youtube-player.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery.js"><\/script>')</script>
<script src="js/scripts.js"></script>
</head>
<body>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
	<script type="text/javascript" src="js/jquery.youtube.player.js"></script>

-->


<div class="container darkbg">
  <div id="headercont">

<div id="mod_mainsearch">
<div id="loading" style="margin: 4px 0;display:none;">loading...</div>
				<div id="search" style="margin: 10px 0;">What makes your body move...and your heart beat?
					<input type="text" class='search_input'/><button type="button" class='search_button'>Go</button><br/></div>
				<div id="result"></div>

</div><!--mod_mainsearch--><br><br>

  </div><!--headercont-->
</div><!--container-->






<div class="container  darkbg2">
<div id="midcont">

</div><!--midcont-->
</div><!--container2-->







<div class="container">

	<div id="maincont" class="clearfix">
	
    
    
    
    	

<div id="mainleft">

   <div id="mainleft_header">
		<div id="headervideo">
				<div class="youtube-player">
					<div class="youtube-player-video">
					<div class="youtube-player-object">
					You need Flash player 8+ and JavaScript enabled to view this video.					</div>
					</div>
				</div><!--youtubeplayer-->		
        </div><!--headervideo--> 
        <div id="headertitle">
           	<?php 
       			if((isset($oneRecord) && $oneRecord === true))
       			{
					echo $pls->PLTITLE;
       			}
       		?>
        </div><!--headertitle-->
       	<div id="headertext">
       		<?php 
       			if((isset($oneRecord) && $oneRecord === true))
       			{
       				echo $pls->DESCRIPTION;
       			}
       		?>
       	</div><!--headertext-->    
      
         <div id="player_toolbar">
	     </div><!--player_toolbar-->
      
      
        
   </div>  <!--mainleft_header-->   
        
        


        

<div id="mod_contlist">
<div class="header">
<span class="title"><h2>Searched Songs</h2></span></div>
<div id="mainlist"></div><!--mainlist--> 
</div>
<!--mod_contlist--> 

 <div id="mod_mainsearch2">
<div id="loading" style="margin: 4px 0;display:none;">loading...</div>

<div class="search_box">
<div id="search">Search
<button type="button" class='search_button2'>Go</button><input type="text" class='search_input2'/></div>
</div>

<div id="result"></div>
</div>
 <!--mod_mainsearch2-->
 

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
		$imgPath = $genImagePath;
	}else{
		$imgPath = "images/stai-music.jpg";
	}
	echo CHtml::image($imgPath);
?>
<!--  <div class="tag">Rebellion</div><img src="images/rebellion2.jpg" alt="playlist1"></div>  -->
</div><!--mod_playCOVER-->	
<div class="mod_playlists">
<div class="header">
<span class="title"><h2>Our Playlist</h2></span></div>
<div class="cont">
    	<?php
    		foreach($bands as $band)
    		{
    			echo CHtml::tag('div', array('class'=>'palinsesto clearfix'), false,false);
    			echo CHtml::link($band->BANDNAME,'#'.$band->BANDID, array('class'=>'myband', 'id'=>$band->BANDID));	
    			echo CHtml::closeTag('div');
    		}
		?>
</div><!--mod_playlists-->	





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

			var firstBandPlaylist = $(".myband")[0].id;
			var videoJSON_G = new Object();
			var random15 = true;
			
			if(random15==true)
			{
				//alert(random15);
				var outputTitle = "random15";
				//var searchInput = {bandId: 1}; //TODO: change with selected genres
				//genericAjaxCallForSongs(urlStr,inputDataArray,outputTitle);
				var genreIdVar = <?php echo $genreId?>;
				$.ajax({
					url: '<?php echo Yii::app()->createUrl('Songs/viewRandomSongsPerGenres')?>',
				   	type: "GET",
				    data: {genreId: genreIdVar},
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
				            	oneVideoJSON.id = data[i].CODE;
				            	oneVideoJSON.title = data[i].TITLE;
				            	videoJSON_G.videos.push(oneVideoJSON);
				            	//alert(oneVideoJSON.id + " - " +oneVideoJSON.title);
				            	i++;
				                	//player.player('loadPlaylist', videoJSON);
				            });
				            //player.player('loadPlaylist', videoJSON);
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
				}
			};
		
			var player = $('.youtube-player').player( playerConfig );
			//var player = $('.youtube-player').player( 'loadPlaylist', videoJSON );
//                        $(".myplaylist").click(function(){
//                            alert("click: "+this.id);
//                        });

			//$('.playlists a[href*=#]').click(function(){
                        $(".myband").click(function(){
                                //TODO: replace with ajax call to the php function
                              //var playlist = playlists[ this.hash.replace(/^.*?#/, '') ];
                                //alert('click ' +playlist.videos[0].id);
                                var selectedPlist = this.id;
                              	//alert('click ' +selectedPlist);
                                $.ajax(
                                {
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
                                            $.each(response, function(i, data){
                                                //alert("data: "+data);
                                                var oneVideoJSON = new Object();
                                                oneVideoJSON.id = data.CODE;
                                                oneVideoJSON.title = data.TITLE;
                                                videoJSON.videos.push(oneVideoJSON);
                                            });
                                            player.player('loadPlaylist', videoJSON);
                                        }
                                        
                                    },
                                    error: function(data)
                                    {
                                        alert("error!!!! "+data);
                                    }
                                }    
                                );
                                
				//player.player('loadPlaylist', playlist);

				return false;
			});

            $(".search_input").focus();
            $(".search_input").bind("enterKey",function(e)
            {
            	search(e,$(this).val());
            });

			$(".search_input").keyup(function(e){
				if(e.keyCode == 13)
				{
					$(this).trigger("enterKey");
				}
			});
                        
            $(".search_button").click(function(e)
            {
            	search(e,$(".search_input").val());
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
		

                        
                        function search(e,search_input)
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
                                                var oneVideoJSON = new Object();
                                                oneVideoJSON.id = data.id;
                                                oneVideoJSON.title = data.title;
                                                videoJSON.videos.push(oneVideoJSON);
                                        });
                                        player.player('loadPlaylist', videoJSON);
                                    }
                                }

                            });
                        }

		})(this.jQuery);

	//]]>
	</script>
<!--  </body>
</html> -->
