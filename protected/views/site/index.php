<!-- <h1>Tags</h1> -->
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
<script src="js/scripts.js"></script> -->
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--   </head> -->
<!--  <body>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
	<script type="text/javascript" src="js/jquery.youtube.player.js"></script>
-->
<div class="container darkbg">
<div id="headercont">

<div id="mod_mainsearch">
<div id="loading" style="margin: 4px 0;display:none;">loading...</div>
<div id="search" style="margin: 10px 0;">What makes your body move...and your heart beat?
	<input type="text" class='search_input'/><button type="button" class='search_button'>Go</button>
	
	
	<br/>
</div>
<div id="result"></div>

</div><!--mod_mainsearch--><br><br><br><br><br>

</div><!--headercont-->
</div><!--container-->

<div class="container">

<div id="maincont" class="clearfix">
	
	<div class="jcarousel-wrapper">
		<!-- div tags -->		
		<div class="jcarousel-prev">
			<a href="#" class="jcarousel-prev" data-jcarouselcontrol="true">
				<img src="images/button-prev.png" />
			</a>
		</div>
		<!-- <div class="bv_maincont3" class="clearfix" >  -->
			<div id="myCarousel" class="jcarousel" data-jcarousel="true">
				<?php
					$max = 5;
					$count = 1;
					echo CHtml::tag('ul', array('class'=>'boxview'),false,false); 
					foreach($dataProvider->getData() as $tag)
					{
						//if($count <= $max){
							
							echo CHtml::tag('li', array(), false,false);
							echo CHtml::tag('div', array('class'=>'tag'),trim($tag->TAGNAME),true);
							echo CHtml::tag('div', array('class'=>'text'),trim($tag->DESCRIPTION),true);
							if(file_exists ( $tag->IMAGEPATH )){
								$imagePath = $tag->IMAGEPATH;
							}else{
								$imagePath = "images/stai-music.jpg";
							}
							$imghtml = CHtml::image($imagePath);
							echo CHtml::link($imghtml, array('Playlists/viewPlPerTag','tagid'=>$tag->TAGID,'tagname'=>trim($tag->TAGNAME),'imagePath'=>$imagePath));
							echo CHtml::closeTag('li');
							
							$count++;
						//}
					}
					echo CHtml::closeTag('ul');
				?>
			</div>

		<div class="jcarousel-next">
			<a href="#" class="jcarousel-next" data-jcarouselcontrol="true">
				<img src="images/button-next.png" />
			</a>
		</div>
		</div>
		
		<div class="jcarousel-plist-wrapper">
		<!-- div playlists -->
		<div class="jcarousel-plist-prev">
			<a href="#" class="jcarousel-plist-prev" data-jcarouselcontrol="true">
				<img src="images/button-prev.png" />
			</a>
		</div>
	<!-- <div id="req_res" class="bv_maincont"> -->
	<div id="myCarousel-plist" class="jcarousel-plist" data-jcarousel="true">
	<?php 
		
		$max = 5;
		$count = 1;
		echo CHtml::tag('ul', array('class'=>'boxview3'),false,false);
		foreach($dataProviderPlaylist->getData() as $playlist)
		{
			//if($count <= $max)
			//{
				echo CHtml::tag('li', array(), false,false);
				$titleTrimmed = trim($playlist->PLTITLE);
				if(strlen($titleTrimmed)>16){
					$shortTitle = substr($playlist->PLTITLE, 0, 16) . " ...";
				}else{
					$shortTitle = $titleTrimmed; 
				}
				echo CHtml::tag('div', array('class'=>'tag'),$shortTitle,true);
				echo CHtml::tag('div', array('class'=>'text'),trim($playlist->DESCRIPTION),true);
				if(file_exists ( $playlist->IMAGEPATH )){
					$imagePath = $playlist->IMAGEPATH;
				}else{
					$imagePath = "images/stai-music.jpg";
				}
				$imghtml = CHtml::image($imagePath);
				echo CHtml::link($imghtml, array('Playlists/view2','id'=>$playlist->PLID));
				echo CHtml::closeTag('li');
				
				$count++;
			//}
		}
		echo CHtml::closeTag('ul');
	?>
	</div>
		<div class="jcarousel-plist-next">
			<a href="#" class="jcarousel-plist-next" data-jcarouselcontrol="true">
				<img src="images/button-next.png" />
			</a>
		</div>
		
		
		
	  </div>
    
    
    
  <div class="jcarousel-gen-wrapper">
		<!-- div playlists -->
		<div class="jcarousel-gen-prev">
			<a href="#" class="jcarousel-gen-prev" data-jcarouselcontrol="true">
				<img src="images/button-prev.png" />
			</a>
		</div>
	<!-- <div id="req_res" class="bv_maincont"> -->
	<div id="myCarousel-gen" class="jcarousel-gen" data-jcarousel="true">
    
    <?php
			$maxGen = 9;
			$countGen = 1;
			echo CHtml::tag('ul', array('class'=>'boxview2'),false,false);
			foreach($dataProviderGenres->getData() as $genre){
				//if($countGen <= $maxGen)
				//{
					echo CHtml::tag('li',array(),false,false);
					if(file_exists ( $genre->IMAGEPATH )){
						$imgGenHtml = CHtml::image($genre->IMAGEPATH);	
					}else{
						$imgGenHtml = CHtml::image("images/stai-music.jpg");
					}
					echo Yii::trace(CVarDumper::dumpAsString($imgGenHtml),'vardump');
					echo CHtml::link($imgGenHtml, array('Playlists/viewPlPerGenres','genid'=>$genre->GENREID));
					echo CHtml::closeTag('li');
					
					$countGen++;
				//}
			}
			echo CHtml::closeTag('ul');
		?>
    
    </div>
		<div class="jcarousel-gen-next">
			<a href="#" class="jcarousel-gen-next" data-jcarouselcontrol="true">
				<img src="images/button-next.png" />
			</a>
		</div>
		
		
		
	  </div>
    
    
  

</div><!--maincont-->
</div><!--container-->





	<script type="text/javascript">
	//<![CDATA[
		(function($){
			//tags
		 	$('.jcarousel').jcarousel();

		    $('.jcarousel-prev').jcarouselControl({
        		target: '-=5'
    		});

    		$('.jcarousel-next').jcarouselControl({
        		target: '+=5'
    		});
			//plists
			$('.jcarousel-plist').jcarousel();
			
			$('.jcarousel-plist-prev').jcarouselControl({
				target: '-=5'
			});
			$('.jcarousel-plist-next').jcarouselControl({
				target: '+=5'
			});
			//gens
			$('.jcarousel-gen').jcarousel();
			$('.jcarousel-gen-prev').jcarouselControl({
				target: '-=5'
			});
			$('.jcarousel-gen-next').jcarouselControl({
				target: '+=5'
			});
			
	           
            $(".search_input").focus();
            $(".search_input").bind("enterKeyTag",function(e)
            {
            	searchTag(e,$(this).val());
            });

			$(".search_input").keyup(function(e){
				if(e.keyCode == 13)
				{
					$(this).trigger("enterKeyTag");
				}
			});
                        
                        $(".search_button").click(function(e)
                        {
                            alert("clicked button");
                            searchTag(e,$(".search_input").val());
                        });

                        
                        function searchTag(e,search_input)
                        {
                            var rawData;    
                            //alert(search_input);
                            $.ajax(
                                    {
                                        url: '<?php echo Yii::app()->createUrl('Tags/search')?>',
                                        type: "GET",
                                        data: {tagNameMatch: search_input},
                                        dataType: "json",
                                        async: false,
                                        success: function(response,status, jqXHR)
                                        {
                                            if(response){
                                                $("#req_res").empty();
                                                var count = 0;
                                                $.each(response.dataProvider.rawData, function(i, elem){
													var tagNameEnc = encodeURIComponent(elem.TAGNAME);
													var descEnc = encodeURIComponent(elem.DESCRIPTION);
													var imgPathEnc = encodeURIComponent(elem.IMAGEPATH);
                                                    
                                                	$("#req_res").append("<ul id="+i+" class='boxview'><li><div class='tag'>" + elem.TAGNAME + 
                                                        	"</div><div class='text'>"+ elem.DESCRIPTION +"</div>"
                                                        	+"<a href='index-test.php?r=Playlists/viewPlPerTag&amp;tagid="+elem.TAGID+"&amp;tagname="+tagNameEnc+"&amp;imagePath="+elem.IMAGEPATH+"'><img src='"+elem.IMAGEPATH+"' alt='' /></a></li></ul>");
                                                	count++;
                                                });
                                            }
                                            
                                        },
                                        error: function(data)
                                        {
                                            alert("error!!!! "+data);
                                        }
                                    }    
                                    );
                            
                            
                        }



            })(this.jQuery);

	//]]>
	</script>
<!--  </body>
</html> -->


