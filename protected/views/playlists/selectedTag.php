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
<!--  <div id="loading" style="margin: 4px 0;display:none;">loading...</div> -->
<div id="search" class="header-answer">What makes your body move...and your heart beat?</div>
<div class="header-form">
	<form id="search_tags" action="<?php echo Yii::app()->createUrl('Tags/searchRender') ?>">
		<input type="text" class='search_input'/><button type="button" class='search_button'>Go</button>
	</form>
</div>
<!--  <div id="result"></div> -->

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
	if(isset($fromGenres) && $fromGenres==true)
	{//display bands
		echo CHtml::tag('div',array('class'=>'tag'),true);
		if(file_exists ( $genImagePath )){
			$imgPath = $genImagePath;
		}else{
			$imgPath = "images/stai-music.jpg";
		}
		echo CHtml::image($imgPath);
	}else{//display playlists
		if((!isset($tagname) || trim($tagname)==='')){
			if(strlen($pls->PLTITLE)>16){
				$shortTitle = substr($pls->PLTITLE, 0, 16) . " ...";
			}else{
				$shortTitle = $pls->PLTITLE;
			}
			echo CHtml::tag('div',array('class'=>'tag'),$shortTitle,true);
			
			if(!is_null($pls->IMAGEPATH) && !empty($pls->IMAGEPATH) && file_exists ( $pls->IMAGEPATH )){
				$imgPath = $pls->IMAGEPATH;
			}else{
				$imgPath = "images/stai-music.jpg";
			}
			echo CHtml::image($imgPath);
		} 
		else{
			echo CHtml::tag('div',array('class'=>'tag'),$tagname,true);
			echo CHtml::image($imagePath);
		}
	}
?>
<!--  <div class="tag">Rebellion</div><img src="images/rebellion2.jpg" alt="playlist1"></div>  -->
</div><!--mod_playCOVER-->	
<div class="mod_playlists">
<div class="header">
<span class="title"><h2>Our Playlist</h2></span></div>
<div class="cont">
    	<?php 
    		
    		if(isset($fromGenres) && $fromGenres==true)
    		{//display bands
    			foreach($bands as $band)
    			{
    				echo CHtml::tag('div', array('class'=>'palinsesto clearfix'), false,false);
    				echo CHtml::link($band->BANDNAME,'#'.$band->BANDID, array('class'=>'myplaylist', 'id'=>$band->BANDID));	
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
	    				echo CHtml::link($pl->PLTITLE,'#'.$pl->PLREF, array('class' => 'myplaylist', 'id' =>$pl->PLID ) );
	    				echo CHtml::closeTag('div');
	    			}
	    		}else{
	    			echo CHtml::tag('div', array('class'=>'palinsesto clearfix'),false,false);	
	    			echo CHtml::link($pls->PLTITLE,'#'.$pls->PLREF, array('class' => 'myplaylist', 'id' =>$pls->PLID ) );
	    			echo CHtml::closeTag('div');
	    		}
    		}
    	
			//echo Yii::trace(CVarDumper::dumpAsString($pls),'vardump');
			
			//Yii::app()->createUrl('Songs/viewSongsPerPlist');
			
		?>        
</div><!--mod_playlists-->	

<div class="suggested_cont">
<div class="suggested_title">Generi suggeriti</div>
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
					$imgPathDB = $genre['IMAGEPATH'];
					$genIdDB = $genre['GENREID'];
					$genDescDB = $genre['DESCRIPTION'];	
				}else{
					$imgPathDB = $genre->IMAGEPATH;
					$genIdDB = $genre->GENREID;
					$genDescDB = $genre->DESCRIPTION;
				}
				$imgGenStr = "images/stai-music.jpg";
				if(file_exists ( $imgPathDB )){
					$imgGenStr = $imgPathDB;
				}
				$imgGenHtml = CHtml::image($imgGenStr);
				echo CHtml::link($imgGenHtml, array('Genres/viewRandomBandsPerGenres','genid'=>$genIdDB,'genImagePath'=>$imgGenStr,'genDescription'=>$genDescDB));
				echo CHtml::closeTag('li');
			}
		}else if(isset($randomGenres)){
			foreach($randomGenres as $randomGenre ){
				echo CHtml::tag('li',array(),false,false);
				$imgGenStr = "images/stai-music.jpg";
				if(file_exists ( $randomGenre['IMAGEPATH'] )){
					$imgGenStr = $randomGenre['IMAGEPATH'];
				}
				$imgGenHtml = CHtml::image($imgGenStr);
				echo CHtml::link($imgGenHtml, array('Genres/viewRandomBandsPerGenres','genid'=>$randomGenre['GENREID'],'genImagePath'=>$imgGenStr,'genDescription'=>$randomGenre['DESCRIPTION']));
				echo CHtml::closeTag('li');
			}
			
		}
	?>
	
<!--  <li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li> -->
</ul>  <br /><br /><br />


 <div class="suggested_title">Tags suggerite</div>
<ul class="suggested">
	<?php 
		if(isset($suggestedTags) && count($suggestedTags)){
			foreach($suggestedTags as $sugTag){
				echo CHtml::tag('li',array(),false,false);		
				if(file_exists ( $sugTag['IMAGEPATH'] )){
					$imagePath = $sugTag['IMAGEPATH'];
				}else{
					$imagePath = "images/stai-music.jpg";
				}
				$imghtml = CHtml::image($imagePath);
				echo CHtml::link($imghtml, array('Playlists/view2','id'=>$sugTag['TAGID']));
				echo CHtml::closeTag('li');
			}
		}
	
		/*if(isset($pls)&&count($pls)>0){
			$count = 0;
			foreach($pls as $plist){
				if($count<5){
					$titleDb = '';
					$idDb = '';
					$imagePathDb = '';
					echo Yii::trace(CVarDumper::dumpAsString("--------> sono in selectedTag"),'vardump');
					echo Yii::trace(CVarDumper::dumpAsString($plist),'vardump');
					if(is_array($plist)){
						$titleDb = $plist['PLTITLE'];
						$idDb = $plist['PLID'];
						$imagePathDb = $plist['IMAGEPATH'];
					}else{
						$titleDb = $plist->PLTITLE;
						$idDb = $plist->PLID;
						$imagePathDb = $plist->IMAGEPATH;
					}
					echo CHtml::tag('li',array(),false,false);
					$titleTrimmed = trim($titleDb);
					if(strlen($titleTrimmed)>16){
						$shortTitle = substr($titleDb, 0, 16) . " ...";
					}else{
						$shortTitle = $titleTrimmed; 
					}
					if(file_exists ( $imagePathDb )){
						$imagePath = $imagePathDb;
					}else{
						$imagePath = "images/stai-music.jpg";
					}
					$imghtml = CHtml::image($imagePath);
					echo CHtml::link($imghtml, array('Playlists/view2','id'=>$idDb));
					echo CHtml::closeTag('li');
				}
				$count++;
			}
		}*/
	?>
<!--  <li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>-->
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
                }    
           	);
			

			//alert(videoJSON_G);
			
			//alert($testVar);
			/*var playlists = {
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
			};*/

			//alert(playlists['playlist-1'].videos[0].id);
			//alert(videoJSON_G.videos[0].id);
			
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

            /*function search(e,search_input)
            {    
            	var keyword = encodeURIComponent(search_input);
                var vevoKeyword = 'vevo%20'+keyword;

                var yt_url = 'http://gdata.youtube.com/feeds/api/videos?q='+vevoKeyword+'&max-results=10&v=2&alt=jsonc';

                $.ajax({
                	type: "GET",
                    url: yt_url,
                    dataType: "json",
                    success: function(response)
                    {
                    	if(response.data.items)
                        {
                        	var videoJSON = new Object();
							videoJSON.title = 'SearchResult';
                            videoJSON.videos = [];
                            $.each(response.data.items, function(i, data){
								var titleUp = data.title.substring(0,2).toUpperCase();
								var keywordUp = keyword.substring(0,2).toUpperCase();
								if(titleUp==keywordUp)
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
