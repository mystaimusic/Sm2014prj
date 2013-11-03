<!DOCTYPE html>
<html>
<head>
<title>Website Name Here</title>
<meta charset="UTF-8">
<!--[if IE]><![endif]-->
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
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
	<script type="text/javascript" src="js/jquery.youtube.player.js"></script>
<div class="container lightbluebg">
    <div id="menucont">
    <a href="http://www.staimusic.com/test3/cover.php" target="_self"><div id="menulogo"><img src="images/logo.png" border="0"></div></a>
        <div class="menu">
 <?php include("includes/menu-top.php"); ?>
            <?php function __autoload($class_name){
                include $class_name . '.php';
            }  
            ?>
        </div>


    </div>
</div>




<div class="container darkbg">
  <div id="headercont">

<div id="mod_mainsearch">
<div id="loading" style="margin: 4px 0;display:none;">loading...</div>
				<div id="search" style="margin: 10px 0;">What makes your body move...and your heart beating?
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


		<div id="headervideo">
				<div class="youtube-player">
					<div class="youtube-player-video">
					<div class="youtube-player-object">
					You need Flash player 8+ and JavaScript enabled to view this video.					</div>
					</div>
				</div><!--youtubeplayer-->
		
              </div>
	  <!--headervideo--> 
        
        


        

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
<button type="button" class='search_button'>Go</button><input type="text" class='search_input'/></div>
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
<div class="tag">Rebellion</div><img src="images/rebellion2.jpg" alt="playlist1"></div>
<div class="mod_playlists">
<div class="header">
<span class="title"><h2>Our Playlist</h2></span></div>
<div class="cont">
    	<?php 
			
			$dataProvider = new CActiveDataProvider($pls);
			$this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_selectedTag',
					'sortableAttributes'=>array('PLTITLE'),
			));
			/*foreach($pls->getData() as $plist)
			{
				echo CHtml::tag('ul', array('class'=>'palinsesto clearfix'),false,false);
            	echo CHtml::tag('li', array(), false,false);
            	//echo CHtml::tag('div', array('class'=>'item_img'),$tag->TAGNAME,true);
            	echo CHtml::tag('div', array('class'=>'item'),$plist->PLTITLE,true);
				echo CHtml::closeTag('li');
            	echo CHtml::closeTag('ul');

			}*/

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
<div class="container clearfix">
    <div id="footercont" class="clearfix">
        <p>Staimusic &copy; 2013 - Design by <a title="Sintesilogica" href="http://www.sintesilogica.com/" rel="external">Sintesilogica</a></p>
    </div>
</div>
	<script type="text/javascript">
	//<![CDATA[

		(function($){

			var playlists = {
				'playlist-1': {
					title: 'Metallica',
					videos: [
						{ id: 'bAsA00-5KoI&gl', title: 'Metallica - Nothing Else Matters [Original Video]' },
						{ id: 'CD-E-LDc384', title: 'Metallica - Enter Sandman [Official Music Video]' }
					]
				},
				'playlist-2': {
					title: 'M83',
					videos: [
						{ id: 'dX3k_QDnzHE', title: 'M83 Midnight City Official Video' },
						{ id: 'Bzge5vY72hE', title: 'M83 - We Own the Sky' }
					]
				},
				'playlist-3': {
					title: 'U2',
					videos: [
						{ id: 'XmSdTa9kaiQ', title: 'U2 - With Or Without You'  						}
					]
				},
				'playlist-4': {
					title: 'Daftpank',
					videos: [
						{ id: 'PsO6ZnUZI0g', title: 'Kanye West - Stronger' },
						{ id: 'G6WEIVDHS7k', title: 'ft Punk - Get Lucky'}
					]
				}
			};

			var playerConfig =  {
				playlist: playlists['playlist-1'], // initial playlist
                                onError: function(msg){

					alert(msg);
                                },
				onBeforePlaylistLoaded: function(playlist){

					$('#loading').show();
				},
				onAfterPlaylistLoaded: function(playlist){

					$('#loading').hide();
				}
			};

			var player = $('.youtube-player').player( playerConfig );
//                        $(".myplaylist").click(function(){
//                            alert("click: "+this.id);
//                        });

			//$('.playlists a[href*=#]').click(function(){
                        $(".myplaylist").click(function(){
                                //TODO: replace with ajax call to the php function
//                              var playlist = playlists[ this.hash.replace(/^.*?#/, '') ];
//                                alert('click ' +playlist.videos[0].id);
                                var selectedPlist = this.id;
                                $.ajax(
                                {
                                    url: "PlaylistBOController.php",
                                    type: "GET",
//                                    url: "http://localhost/SM/PlaylistBO.php?class=PlaylistBO&method=getSongsByPlaylistRef&param=playlist-1",
                                    data: {call: "getSongsByPlaylistRef", plref: selectedPlist},
                                    dataType: "json",
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
                                                oneVideoJSON.id = data.ID_VIDEO;
                                                oneVideoJSON.title = data.VIDEO_TITLE;
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

                            }       
                            );
                        }

		})(this.jQuery);

	//]]>
	</script>
</body>
</html>
