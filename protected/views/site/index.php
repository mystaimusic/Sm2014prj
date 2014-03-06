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

<div id="search" class="header-answer">Cosa ti fa ballare e battere il cuore?</div>
<div class="header-form">
	<input type="text" class='search_input'/><button type="button" class='search_button'>Go</button>
</div>

</div><br><br><br><br><br>

</div>
</div>

<div class="container">



<div id="maincont" class="clearfix">
	
	<div class="jcarousel-wrapper">
		<!-- div tags -->		
		<div class="jcarousel-prev">
			<a id="jcarousel-prev-btn" href="#" class="jcarousel-prev" data-jcarouselcontrol="true"></a>
		</div>
		<!-- <div class="bv_maincont3" class="clearfix" >  -->
			<div id="myCarousel" class="jcarousel" data-jcarousel="true">
			<!--  <div id="myCarousel" class="jcarousel" data-jcarousel="true">  -->
				<?php
					echo CHtml::tag('ul', array('id'=>'myCarouselUl', 'class'=>'boxview'),false,false); 
					foreach($dataProvider->getData() as $tag)
					{		
						echo CHtml::tag('li', array(), false,false);
						$divtag = CHtml::tag('div', array('class'=>'tag'),trim($tag->TAGNAME),true);
						$divtext = CHtml::tag('div', array('class'=>'text'),trim($tag->DESCRIPTION),true);
						if(file_exists ( $tag->IMAGEPATH )){
							$imagePath = $tag->IMAGEPATH;
						}else{
							$imagePath = "images/stai-music.jpg";
						}
						$imghtml = CHtml::image($imagePath);
						echo CHtml::link($divtag.$divtext.$imghtml, array('Playlists/viewPlPerTag','tagid'=>$tag->TAGID,'tagname'=>trim($tag->TAGNAME),'imagePath'=>$imagePath));
						echo CHtml::closeTag('li');
					}
					echo CHtml::closeTag('ul');
				?>
			</div>

		<div class="jcarousel-next">
			<a id="jcarousel-next-btn" href="#" class="jcarousel-next" data-jcarouselcontrol="true"></a>
		</div>
	</div>





		
	<div class="jcarousel-plist-wrapper">
		<!-- div playlists -->
		<div class="jcarousel-plist-prev">
			<a id="jcarousel-plist-prev-btn" href="#" class="jcarousel-plist-prev" data-jcarouselcontrol="true"></a>
		</div>
	<!-- <div id="req_res" class="bv_maincont"> -->
	<div id="myCarousel-plist" class="jcarousel-plist" data-jcarousel="true">
	<?php 
		
		echo CHtml::tag('ul', array('id'=>'myCarousel-plistUl','class'=>'boxview3'),false,false);
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
				$divtag = CHtml::tag('div', array('class'=>'tag'),$shortTitle,true);
				$divtext = CHtml::tag('div', array('class'=>'text'),trim($playlist->DESCRIPTION),true);
				if(file_exists ( $playlist->IMAGEPATH )){
					$imagePath = $playlist->IMAGEPATH;
				}else{
					$imagePath = "images/stai-music.jpg";
				}
				$imghtml = CHtml::image($imagePath);
				echo CHtml::link($divtag.$divtext.$imghtml, array('Playlists/view2','id'=>$playlist->PLID));
				echo CHtml::closeTag('li');
			//}
		}
		echo CHtml::closeTag('ul');
	?>
	</div>
		<div class="jcarousel-plist-next">
			<a id="jcarousel-plist-next-btn" href="#" class="jcarousel-plist-next" data-jcarouselcontrol="true">
			</a>
		</div>
	</div>
    
    
    
  <div class="jcarousel-gen-wrapper">
		<!-- div playlists -->
		<div class="jcarousel-gen-prev">
			<a href="#" class="jcarousel-gen-prev" data-jcarouselcontrol="true">

			</a>
		</div>
	<!-- <div id="req_res" class="bv_maincont"> -->
	<div id="myCarousel-gen" class="jcarousel-gen" data-jcarousel="true">
    
    <?php
		echo CHtml::tag('ul', array('id'=>'myCarousel-genUl','class'=>'boxview2'),false,false);
		foreach($dataProviderGenres->getData() as $genre){
			echo CHtml::tag('li',array(),false,false);
			$imgGenStr = "images/stai-music.jpg";
			if(file_exists ( $genre->IMAGEPATH )){
				$imgGenStr = $genre->IMAGEPATH;	
			}
			$imgGenHtml = CHtml::image($imgGenStr);
			//echo Yii::trace(CVarDumper::dumpAsString($imgGenHtml),'vardump');
			echo CHtml::link($imgGenHtml, array('Genres/viewRandomBandsPerGenres','genid'=>$genre->GENREID,'genImagePath'=>$genre->IMAGEPATH,'genDescription'=>$genre->DESCRIPTION));
			echo CHtml::closeTag('li');
		}
		echo CHtml::closeTag('ul');
	?>
    
    </div>
		<div class="jcarousel-gen-next">
			<a href="#" class="jcarousel-gen-next" data-jcarouselcontrol="true">

			</a>
		</div>
		
		
		
	  </div>
    
    
  

</div><!--maincont-->
</div><!--container-->





	<script type="text/javascript">
	//<![CDATA[
		(function($){
			addFading("ul.boxview li .text", ".boxview li a");
			addFading("ul.boxview3 li .text", ".boxview3 li a");
			var tagsPage = 1;
			var plistPage = 1;
			var gensPage = 1;
			var totalTags = <?php echo Yii::app()->user->getState('countTags');?>;
			var totalPlist = <?php echo Yii::app()->user->getState('countPlists');?>;
			var totalGenres = <?php echo Yii::app()->user->getState('countGenres');?>;

			var totTagPages = Math.floor(totalTags/5);
			var remTags = totalTags % 5;
			//var testVar = 20%5;
			//alert(testVar);
			if(remTags>0){
				totTagPages++; 
			}
			//alert(totTagPages);
			var totPlistPage = Math.floor(totalPlist/5);
			var remPlist = totPlistPage % 5;
			if(remPlist>0){
				totPlistPage++;
			}
			//alert(rem);
			
			//tags
			var myjcarousel = $("#myCarousel")
				/*.on('jcarousel:create jcarousel:reload', function(){
					var element = $(this),
					width = element.innerWidth();
					element.jcarousel('items').css('width', width/5 + 'px');
				})*/
				.jcarousel({ wrap: 'circular'});

			$('.jcarousel-prev').jcarouselControl({
        		target: '-=5'
    		});
    		//$('.jcarousel-next').jcarouselControl({
        	//	target: '+=5'
    		//});
			//plists
			var myjcarouselPlist = $("#myCarousel-plist").jcarousel({ wrap: 'circular'});
			//$('.jcarousel-plist').jcarousel();
			$('.jcarousel-plist-prev').jcarouselControl({
				target: '-=5'
			});
			//$('.jcarousel-plist-next').jcarouselControl({
			//	target: '+=5'
			//});
			//gens
			$('.jcarousel-gen').jcarousel({ wrap: 'circular'});
			$('.jcarousel-gen-prev').jcarouselControl({
				target: '-=5'
			});
			$('.jcarousel-gen-next').jcarouselControl({
				target: '+=5'
			});
			
			$("#jcarousel-next-btn").click(function(e)
			{
				if(tagsPage<totTagPages-1){
					tagsPage++;
					//myjcarousel.jcarousel('scroll','+=5');
					$('.jcarousel-next').jcarouselControl({
        				target: '+=5'
    				});
    				//alert(totTagPages +' ' +tagsPage);
					$.ajax({
	                	url: '<?php echo Yii::app()->createUrl('Site/getNextTag')?>',
	                    type: "GET",
	                    data: {currentPage: tagsPage, type: "TAG"},
	                  	dataType: "json",
	                    async: false,
	                   	success: function(response,status, jqXHR)
	                    {
	                    	if(response){
	                            var html='';
	                            $.each(response.dataProvider.rawData, function(i, elem){                               
									var tagNameEnc = encodeURIComponent(elem.TAGNAME);
									var descEnc = encodeURIComponent(elem.DESCRIPTION);
									var imgPathEnc = encodeURIComponent(elem.IMAGEPATH);
									html += "<li><a href='index.php?r=Playlists/viewPlPerTag&amp;tagid="
	                                +elem.TAGID+"&amp;tagname="
	                                +tagNameEnc+"&amp;imagePath="
	                                +elem.IMAGEPATH+"'><div class='tag'>" + elem.TAGNAME + 
	                                "</div><div class='text'>"+ elem.DESCRIPTION +"</div>"
	                                +"<img src='"
	                                +elem.IMAGEPATH+"' alt='' /></a></li>";
	                  			});
	                            $("#myCarouselUl").append(html);
					            // Reload carousel
	            				myjcarousel.jcarousel('reload');
	            				addFading("ul.boxview li .text", ".boxview li a");
	                    	}
	             		},
	                    error: function(data)
	                    {
	                    	alert("error!!!! "+data);
	                   	}
	                });
				}
            });

			$("#jcarousel-plist-next-btn").click(function(e)
			{
				if(plistPage<totPlistPage-1){
					plistPage++;
					$('.jcarousel-plist-next').jcarouselControl({
						target: '+=5'
					});
					//alert(totPlistPage +' ' +plistPage);
					$.ajax({
	                	url: '<?php echo Yii::app()->createUrl('Site/getNextTag')?>',
	                    type: "GET",
	                    data: {currentPage: plistPage, type: "PL"},
	                  	dataType: "json",
	                    async: false,
	                   	success: function(response,status, jqXHR)
	                    {
	                    	if(response){
	                            var html='';
	                            //alert("response");
	                            $.each(response.dataProvider.rawData, function(i, elem){
	                                var plTitle = elem.PLTITLE;
	                                if(elem.PLTITLE.length>16){
	                                	plTitle = elem.PLTITLE.substring(0,16) + " ...";
	                                }
									var tagNameEnc = encodeURIComponent(plTitle);
									var descEnc = encodeURIComponent(elem.DESCRIPTION);
									var imgPathEnc = encodeURIComponent(elem.IMAGEPATH);
									html += "<li><a href='index.php?r=Playlists/view2&amp;id="
	                                +elem.PLID+"'><div class='tag'>" + plTitle + 
	                                "</div><div class='text'>"+ elem.DESCRIPTION +"</div>"
	                                +"<img src='"
	                                +elem.IMAGEPATH+"' alt='' /></a></li>";
	                  			});
	                            $("#myCarousel-plistUl").append(html);
					            // Reload carousel
	            				myjcarouselPlist.jcarousel('reload');
	            				addFading("ul.boxview3 li .text", ".boxview3 li a");
	                    	}
	             		},
	                    error: function(data)
	                    {
	                    	alert("error!!!! "+data);
	                   	}
	                });
				}
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
                searchTag(e,$(".search_input").val());
            });

			function addFading(selector_ul, selector_a){
				$(selector_ul).css({'opacity':'0'});

				$(selector_a).hover(

					function() {
						$(this).find('.text').stop().fadeTo(700, 0.8);
					},
					function() {
						$(this).find('.text').stop().fadeTo(500, 0);
					}
				)
			}

           	function searchTag(e,search_input)
            {
           		<?php unset(Yii::app()->session['bandsIdStr']);?>
            	var rawData;    
                $.ajax({
                	url: '<?php echo Yii::app()->createUrl('Tags/parallelSearch')?>',
                    type: "GET",
                    data: {tagNameMatch: search_input},
                  	dataType: "json",
                    async: false,
                   	success: function(response,status, jqXHR)
                    {
                    	if(response){
                            var count = 0;
                            //if(response.type=='TAG'){
                            	$("#myCarousel").empty();
	                            $("#myCarousel").append("<ul id='myCarouselUl' class='boxview'>");
	                            if(response.filterTags.length==0){
	                            	$(".jcarousel-prev").hide();
	                            	$(".jcarousel-next").hide();
	                            	$("#jcarousel-next-btn").hide();
	                            	$("#jcarousel-prev-btn").hide();
		                        }else{
		                        	$(".jcarousel-prev").show();
		                        	$(".jcarousel-next").show();
		                        	$("#jcarousel-next-btn").show();
	                            	$("#jcarousel-prev-btn").show();
			                    }
	                            $.each(response.filterTags, function(i, elem){
	                            //$.each(response.dataProvider.rawData, function(i, elem){
									var tagNameEnc = encodeURIComponent(elem.TAGNAME);
									var descEnc = encodeURIComponent(elem.DESCRIPTION);
									var imgPathEnc = encodeURIComponent(elem.IMAGEPATH);                    
	                                $("#myCarouselUl").append("<li><div class='tag'>" + elem.TAGNAME + 
	                                            "</div><div class='text'>"+ elem.DESCRIPTION +"</div>"
	                                            +"<a href='index.php?r=Playlists/viewPlPerTag&amp;tagid="
	                                            +elem.TAGID+"&amp;tagname="
	                                            +tagNameEnc+"&amp;imagePath="
	                                            +elem.IMAGEPATH+"'><img src='"
	                                            +elem.IMAGEPATH+"' alt='' /></a></li>");
	                                count++;
	                  			});
	                  			addFading("ul.boxview li .text", ".boxview li a");
	                    	//}
	                    	//if(response.type=='PL'){
	                    		$("#myCarousel-plist").empty();
	                    	    $("#myCarousel-plist").append("<ul id='myCarousel-plistUl' class='boxview3'>");
	                    	    if(response.filterPlist.length==0){
		                    	    $(".jcarousel-plist-prev").hide();
		                    	    $(".jcarousel-plist-next").hide();
	                    	    	$("#jcarousel-plist-next-btn").hide();
	                    	    	$("#jcarousel-plist-prev-btn").hide();
		                    	}else{
		                    		$(".jcarousel-plist-prev").show();
		                    	    $(".jcarousel-plist-next").show();
		                    		$("#jcarousel-plist-next-btn").show();
	                    	    	$("#jcarousel-plist-prev-btn").show();
			                    }
	                    	    $.each(response.filterPlist, function(i, elem){
		                    	    var plTitle = elem.PLTITLE;
		                    	    if(elem.PLTITLE.length>16){
										plTitle = elem.PLTITLE.substring(0,16) + " ...";					
			                    	} 
	                    	    	var tagNameEnc = encodeURIComponent(plTitle);
									var descEnc = encodeURIComponent(elem.DESCRIPTION);
									var imgPathEnc = encodeURIComponent(elem.IMAGEPATH);                    
	                                $("#myCarousel-plistUl").append("<li><div class='tag'>" + elem.PLTITLE + 
	                                            "</div><div class='text'>"+ elem.DESCRIPTION +"</div>"
	                                            +"<a href='index.php?r=Playlists/view2&amp;id="
	                                            +elem.PLID+"'><img src='"
	                                            +elem.IMAGEPATH+"' alt='' /></a></li>");
	                                count++;
		                    	});
	                    	    addFading("ul.boxview3 li .text", ".boxview3 li a");
		                    //}
		                    //if(response.type=='GEN'){
		                    	$("#myCarousel-gen").empty();
	                    	    $("#myCarousel-gen").append("<ul id='myCarousel-genUl' class='boxview2'>");
	                    	    if(response.filterGen.length==0){
	                    	    	$(".jcarousel-gen-prev").hide();
		                    	    $(".jcarousel-gen-next").hide();
	                    	    	$("#jcarousel-gen-next-btn").hide();
	                    	    	$("#jcarousel-gen-prev-btn").hide();
		                    	}else{
		                    		$(".jcarousel-gen-prev").show();
		                    	    $(".jcarousel-gen-next").show();
		                    		$("#jcarousel-gen-next-btn").show();
	                    	    	$("#jcarousel-gen-prev-btn").show();
			                    }
	                    	    $.each(response.filterGen, function(i, elem){
	                    	    	var tagNameEnc = encodeURIComponent(elem.GENRENAME);
									var descEnc = encodeURIComponent(elem.DESCRIPTION);
									var imgPathEnc = encodeURIComponent(elem.IMAGEPATH);                    
	                                $("#myCarousel-genUl").append("<li><a href='index.php?r=Genres/viewRandomBandsPerGenres&amp;genid="
	                                            +elem.GENREID+"&amp;genImagePath="
	                                            +elem.IMAGEPATH+"&amp;genDescription="
	                                            +elem.descEnc+"'><img src='"
	                                            +elem.IMAGEPATH+"' alt='' /></a></li>");
	                                count++;
		                    	});
				            //}
                    	}
             		},
                    error: function(data)
                    {
                    	alert("error!!!! "+data);
                   	}
                });
            }

  		})(this.jQuery);

	//]]>
	</script>
<!--  </body>
</html> -->


