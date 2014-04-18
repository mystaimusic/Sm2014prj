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
		<div id="jcarousel-prev-div" class="jcarousel-prev">
			<a id="jcarousel-prev-btn" href="#" class="jcarousel-prev" data-jcarouselcontrol="true"></a>
		</div>
		<!-- <div class="bv_maincont3" class="clearfix" >  -->
			<div id="myCarousel" class="jcarousel" data-jcarousel="true">
			<!--  <div id="myCarousel" class="jcarousel" data-jcarousel="true">  -->
				<?php
					echo CHtml::tag('ul', array('id'=>'myCarouselUl', 'class'=>'boxview'),false,false);
					echo CHtml::tag('li', array(),false,false);
					echo CHtml::image(Yii::app()->request->baseUrl."/images/tag-musicali.jpg");
					echo CHtml::closeTag('li');
					foreach($dataProvider->getData() as $tag)
					{
						echo CHtml::tag('li', array(), false,false);
						$divtag = CHtml::tag('div', array('class'=>'tag'),trim($tag->TAGNAME),true);
						$divtext = CHtml::tag('div', array('class'=>'text'),trim($tag->DESCRIPTION),true);
						if(file_exists ( $tag->IMAGEPATH )){
							$imagePath = Yii::app()->request->baseUrl."/".$tag->IMAGEPATH;
						}else{
							$imagePath = Yii::app()->request->baseUrl."/images/stai-music.jpg";
						}
						$imghtml = CHtml::image($imagePath);
						$tagUrl = Utilities::getTagUrl($tag->TAGNAME,$tag->TAGID);
						//echo CHtml::link($divtag.$divtext.$imghtml, $tagUrl);
						echo CHtml::link($divtag.$divtext.$imghtml, array('Playlists/viewPlPerTag','id'=>$tag->TAGID));
						//echo Yii::trace(CVarDumper::dumpAsString(Yii::app()->request->baseUrl),'vardump');
						echo CHtml::closeTag('li');
					}
					echo CHtml::closeTag('ul');
				?>
			</div>

		<div id="jcarousel-next-div" class="jcarousel-next">
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
		echo CHtml::tag('li', array(),false,false);
		echo CHtml::image(Yii::app()->request->baseUrl."/images/playlist-musicali.jpg");
		echo CHtml::closeTag('li');
		foreach($dataProviderPlaylist->getData() as $playlist)
		{
			//if($count <= $max)
			//{
				echo CHtml::tag('li', array(), false,false);
				$titleTrimmed = trim($playlist->PLTITLE);
				if(strlen($titleTrimmed)>50){
					$shortTitle = substr($playlist->PLTITLE, 0, 50) . " ...";
				}else{
					$shortTitle = $titleTrimmed; 
				}
				$divtag = CHtml::tag('div', array('class'=>'tag'),$shortTitle,true);
				$divtext = CHtml::tag('div', array('class'=>'text'),trim($playlist->DESCRIPTION),true);
				/*if(file_exists ( $playlist->IMAGEPATH )){
					$imagePath = $playlist->IMAGEPATH;
				}else{
					$imagePath = "images/stai-music.jpg";
				}*/
				if(file_exists ( $playlist->IMAGEPATH )){
					$imagePath = Yii::app()->request->baseUrl."/".$playlist->IMAGEPATH;
				}else{
					$imagePath = Yii::app()->request->baseUrl."/images/stai-music.jpg";
				}
				//$imagePath = Utilities::replaceDefaultImage($imagePath);
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
		<!-- div genres -->
		<div class="jcarousel-gen-prev">
			<a id="jcarousel-gen-prev-btn" href="#" class="jcarousel-gen-prev" data-jcarouselcontrol="true">
			</a>
		</div>
		<div id="myCarousel-gen" class="jcarousel-gen" data-jcarousel="true">
    		<?php
				echo CHtml::tag('ul', array('id'=>'myCarousel-genUl','class'=>'boxview2'),false,false);
				foreach($dataProviderGenres->getData() as $genre){
					echo CHtml::tag('li',array(),false,false);
					/*$imgGenStr = "images/stai-music.jpg";
					if(file_exists ( $genre->IMAGEPATH )){
						$imgGenStr = $genre->IMAGEPATH;	
					}
					$imgGenHtml = CHtml::image($imgGenStr);*/
					$imgGenStr = Utilities::replaceDefaultImage($genre->IMAGEPATH);
					$imgGenHtml = CHtml::image($imgGenStr);
					//echo Yii::trace(CVarDumper::dumpAsString($imgGenHtml),'vardump');
					//echo CHtml::link($imgGenHtml, array('Genres/viewRandomBandsPerGenres','genid'=>$genre->GENREID,'genImagePath'=>$genre->IMAGEPATH,'genDescription'=>$genre->DESCRIPTION));
					echo CHtml::link($imgGenHtml, array('Genres/viewRandomBandsPerGenres','id'=>$genre->GENREID));
					echo CHtml::closeTag('li');
				}
				echo CHtml::closeTag('ul');
			?>
    	</div>
		<div class="jcarousel-gen-next">
			<a id="jcarousel-gen-next-btn" href="#" class="jcarousel-gen-next" data-jcarouselcontrol="true">
			</a>
		</div>
	</div>
  
<div id="maincenter">
Sei stanco di non sapere che musica ascoltare? Sei stufo di sentire sempre musica di basso profilo?<br />
Scopri nuova musica e ascolta musica di qualit&agrave;; fatti trasportare in viaggi sonori attraverso il tempo e lo spazio.<br />
Staimusic ti permette di riscoprire canzoni famose sotto una nuova luce, di ascoltare e vedere video musicali selezionati per te.<br />
Fatti condurre alla ricerca di quello che ti piace, alla ricerca dell'orgasmo sonoro.<br />
Segui le nostre playlist e partendo da esse esplora gruppi, generi, tematiche, idee e mode.<br />
Perch&egrave; la musica non &egrave; solo puro ascolto, &egrave; pensiero, storia, concetti, rivoluzione, una potente droga che ci stimola la vita.<br /><br />

<h1>Non perdere tempo, collegati e vivi la musica!</h1>
</div><!--maincenter-->
</div><!--maincont-->
</div><!--container-->

	<script type="text/javascript">
	//<![CDATA[
		(function($){
			var htmlJcarouselPrev = "<div id='jcarousel-prev-div' class='jcarousel-prev'><a id='jcarousel-prev-btn' href='#' class='jcarousel-prev' data-jcarouselcontrol='true'></a></div>";
			var htmlJcarouselNext = "<div id='jcarousel-next-div' class='jcarousel-next'><a id='jcarousel-next-btn' href='#' class='jcarousel-next' data-jcarouselcontrol='true'></a></div>";
			
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

			var totGenPage = Math.floor(totalGenres/9);
			var remGen = totGenPage % 9;
			if(remGen>0){
				totGenPage++;
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
			//$('.jcarousel-gen').jcarousel({ wrap: 'circular'});
			var myjcarouselGen = $("#myCarousel-gen").jcarousel({ wrap: 'circular'});
			$('.jcarousel-gen-prev').jcarouselControl({
				target: '-=9'
			});
			//$('.jcarousel-gen-next').jcarouselControl({
			//	target: '+=5'
			//});
			
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
									var tagId = elem.TAGID;
									var url = "<?php echo Yii::app()->createUrl('Playlists/viewPlPerTag')?>";
									var urlComplete = url + "/id/"+tagId;
									//html += "<li><a href='index.php/Playlists/viewPlPerTag/id/"
									html += "<li><a href='"+urlComplete+"'><div class='tag'>" + elem.TAGNAME + 
	                                "</div> <div class='text'>"+ elem.DESCRIPTION +"</div> "
	                                +"<img src='"
	                                +elem.IMAGEPATH+"' alt='' /></a></li>";
	                  			});
	                  			//var finalHtml = html.html();
	                  			//alert(html);
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
	                                var plId = elem.PLID;
	                                var url = "<?php echo Yii::app()->createUrl('Playlists/view2')?>";
	                                var urlComplete = url + "/id/"+ plId; 
	                                if(elem.PLTITLE.length>50){
	                                	plTitle = elem.PLTITLE.substring(0,50) + " ...";
	                                }
									var tagNameEnc = encodeURIComponent(plTitle);
									var descEnc = encodeURIComponent(elem.DESCRIPTION);
									var imgPathEnc = encodeURIComponent(elem.IMAGEPATH);
									html += "<li><a href='"+urlComplete+"'><div class='tag'>" + plTitle + 
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

			$("#jcarousel-gen-next-btn").click(function(e)
			{
				if(gensPage<totGenPage-1){
					gensPage++;
					$('.jcarousel-gen-next').jcarouselControl({
						target: '+=9'
					});
					//alert(totPlistPage +' ' +plistPage);
					$.ajax({
	                	url: '<?php echo Yii::app()->createUrl('Site/getNextTag')?>',
	                    type: "GET",
	                    data: {currentPage: gensPage, type: "GEN"},
	                  	dataType: "json",
	                    async: false,
	                   	success: function(response,status, jqXHR)
	                    {
	                    	if(response){
	                            var html='';
	                            //alert("response");
	                            $.each(response.dataProvider.rawData, function(i, elem){
	                                var genName = elem.GENRENAME;
									var tagNameEnc = encodeURIComponent(genName);
									var genId = elem.GENREID;
									var url = "<?php echo Yii::app()->createUrl('Genres/viewRandomBandsPerGenres')?>";
									var urlComplete = url + "/id/"+genId;
									html += "<li><a href='"+urlComplete+"'><img src='"+elem.IMAGEPATH+"' alt='' /></a></li>";
	                  			});
	                            $("#myCarousel-genUl").append(html);
					            // Reload carousel
	            				myjcarouselGen.jcarousel('reload');
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
	                            	$("#myCarousel").append("<div class='NON TROVATI'>Tags non trovati</div>");
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
									$("#myCarouselUl").append("<li><a href='index.php/Playlists/viewPlPerTag/id/"
	                                //$("#myCarouselUl").append("<li><a href='index.php?r=Playlists/viewPlPerTag&amp;tagid="
	                                            +elem.TAGID+"'><div class='tag'>" + elem.TAGNAME + 
	                                            "</div><!--<div class='text'>"+ elem.DESCRIPTION +"</div>-->"
	                                            +"<img src='"
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
	                    	    	$("#myCarousel-plist").append("<div>Playlists non trovate</div>");
		                    	}else{
		                    		$(".jcarousel-plist-prev").show();
		                    	    $(".jcarousel-plist-next").show();
		                    		$("#jcarousel-plist-next-btn").show();
	                    	    	$("#jcarousel-plist-prev-btn").show();
			                    }
	                    	    $.each(response.filterPlist, function(i, elem){
		                    	    var plTitle = elem.PLTITLE;
		                    	    if(elem.PLTITLE.length>50){
										plTitle = elem.PLTITLE.substring(0,50) + " ...";					
			                    	} 
	                    	    	var tagNameEnc = encodeURIComponent(plTitle);
									var descEnc = encodeURIComponent(elem.DESCRIPTION);
									var imgPathEnc = encodeURIComponent(elem.IMAGEPATH);
									$("#myCarousel-plistUl").append("<li><a href='index.php/Playlists/view2/id/"
	                                //$("#myCarousel-plistUl").append("<li><a href='index.php?r=Playlists/view2&amp;id="
	                                            +elem.PLID+"'><div class='tag'>" + elem.PLTITLE + 
	                                            "</div><div class='text'>"+ elem.DESCRIPTION +"</div>"
	                                            +"<img src='"
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
	                    	    	$("#myCarousel-gen").append("<div>Generi non trovati</div>");
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
									$("#myCarousel-genUl").append("<li><a href='index.php/Genres/viewRandomBandsPerGenres/id/"
	                                //$("#myCarousel-genUl").append("<li><a href='index.php?r=Genres/viewRandomBandsPerGenres&amp;genid="
	                                            //+elem.GENREID+"&amp;genImagePath="
	                                            //+elem.IMAGEPATH+"&amp;genDescription="
	                                            //+elem.descEnc+
	                                            +elem.GENREID+"'><img src='"
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


