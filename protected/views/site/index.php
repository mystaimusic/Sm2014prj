<div class="container darkbg">
  <div id="headercont">
  
   <div id="mod_mainsearch">
   		<div id="search" class="header-answer"><?php 
   		$transl = Yii::t('msg','What makes you dance and your heart beat?');
   		echo $transl; ?></div>
       <!-- <div id="search" class="header-answer">Cosa ti fa ballare e battere il cuore?</div> -->
       <div class="header-form"><input type="text" class='search_input'/><button type="button" class='search_button'><?php 
   		$transl = Yii::t('msg','Find');
   		echo $transl; ?></button></div>
   </div><!-- mod_mainsearch -->
  </div><!-- headercont -->
</div><!-- container -->

<div class="container">

<div id="maincont" class="clearfix">

   <div class="row_orderby">
	<!--  Order by: <button id="orderByAlpha" type="button">Ordine Alfabetico</button> -->
	<?php echo CHtml::beginForm(Yii::app()->createUrl('Site/index'),'request');?>
        <div class="col"><?php 
   		$transl = Yii::t('msg','Select:');
   		echo $transl; ?></div>

	<div class="col">
         <input type="hidden" name="flagType" value="A">
	<?php echo CHtml::submitButton("alphabetic order",array('id'=>'OrdAlph','name'=>'OrdineAlfabetico'));?>
	<?php echo CHtml::endForm();?></div>

        <div class="col">
	<?php echo CHtml::beginForm(Yii::app()->createUrl('Site/index'),'request');?>
	<input type="hidden" name="flagType" value="R">
	<?php echo CHtml::submitButton("random order",array('id'=>'OrdRand','name'=>'OrdineCasuale'));?>
	<?php echo CHtml::endForm();?></div>

    </div><!--row_orderby -->
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
					$currLang = Yii::app()->language;
					echo CHtml::image(Yii::app()->request->baseUrl."/images/tag_".$currLang.".jpg");
					echo CHtml::closeTag('li');
					foreach($dataProvider->getData() as $tag)
					{
						echo CHtml::tag('li', array(), false,false);
						$title = $tag->tagname;
						$description = $tag->description;
						if($currLang!="en_us"){
							$traslation=TopicTranslations::model()->findByPk(array('id'=>$tag->tagid,'lang'=>$currLang,'topic'=>'tag'));
							$title = $traslation->title;
							$description = $traslation->description;
						}
						
						$divtag = CHtml::tag('div', array('class'=>'tag'),trim($title),true);
						$divtext = CHtml::tag('div', array('class'=>'text'),trim($description),true);
						if(file_exists ( $tag->imagepath )){
							$imagePath = Yii::app()->request->baseUrl."/".$tag->imagepath;
						}else{
							$imagePath = Yii::app()->request->baseUrl."/images/stai-music.jpg";
						}
						$imghtml = CHtml::image($imagePath);
						$tagUrl = Utilities::getTagUrl($tag->tagname,$tag->tagid);
						//echo CHtml::link($divtag.$divtext.$imghtml, $tagUrl);
						$urlPrefixTag = Utilities::getUrlPrefixByLang($currLang, "tag");
						$tagLink = Utilities::buildUserFriendlyURL($urlPrefixTag,/*$tag->tagname*/$title,$tag->tagid);
						$tagLinkTest = Yii::app()->createUrl($tagLink);
						//echo Yii::trace(CVarDumper::dumpAsString("----------> tagLinkTest"),'vardump');
						//echo Yii::trace(CVarDumper::dumpAsString($tagLinkTest),'vardump');
						echo CHtml::link($divtag.$divtext.$imghtml, array($tagLink));
						//echo Yii::trace(CVarDumper::dumpAsString("----------> tagLink"),'vardump');
						//echo Yii::trace(CVarDumper::dumpAsString($tagLink),'vardump');
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
		echo CHtml::image(Yii::app()->request->baseUrl."/images/playlist_".$currLang.".jpg");
		echo CHtml::closeTag('li');
		foreach($dataProviderPlaylist->getData() as $playlist)
		{
			echo CHtml::tag('li', array(), false,false);
			$title = $playlist->pltitle;
			$description = $playlist->description;
			if($currLang!="en_us"){
				$traslation=TopicTranslations::model()->findByPk(array('id'=>$playlist->plid,'lang'=>$currLang,'topic'=>'playlist'));
				$title = $traslation->title;
				$description = $traslation->description;
			}

			$titleTrimmed = trim($title);
			if(strlen($titleTrimmed)>50){
				$shortTitle = substr($title, 0, 50) . " ...";
			}else{
				$shortTitle = $titleTrimmed; 
			}
			$divtag = CHtml::tag('div', array('class'=>'tag'),$shortTitle,true);
			$divtext = CHtml::tag('div', array('class'=>'text'),trim($description),true);
			if(file_exists ( $playlist->imagepath )){
				$imagePath = Yii::app()->request->baseUrl."/".$playlist->imagepath;
			}else{
				$imagePath = Yii::app()->request->baseUrl."/images/stai-music.jpg";
			}
			//$imagePath = Utilities::replaceDefaultImage($imagePath);
			$urlPrefixPlaylist = Utilities::getUrlPrefixByLang($currLang, "playlist");
			$plistLink = Utilities::buildUserFriendlyURL($urlPrefixPlaylist,/*$playlist->pltitle*/$title,$playlist->plid);
			$imghtml = CHtml::image($imagePath);
			//'playlist-musicali/<id:\d+>_<title:\w+>.html'=>'Playlists/view2/<id:\d+>'
			echo CHtml::link($divtag.$divtext.$imghtml, array($plistLink));
			//echo CHtml::link($divtag.$divtext.$imghtml, array('Playlists/view2','id'=>$playlist->PLID));
			echo CHtml::closeTag('li');
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
					$imgGenStr = Utilities::replaceDefaultImage($genre->imagepath);
					$imgGenHtml = CHtml::image($imgGenStr);
					//echo Yii::trace(CVarDumper::dumpAsString($imgGenHtml),'vardump');
					//echo CHtml::link($imgGenHtml, array('Genres/viewRandomBandsPerGenres','genid'=>$genre->GENREID,'genImagePath'=>$genre->IMAGEPATH,'genDescription'=>$genre->DESCRIPTION));
					$urlPrefixGenre = Utilities::getUrlPrefixByLang($currLang, "genre");
					$title = $genre->genrename;
					if($currLang!="en_us"){
						$traslation=TopicTranslations::model()->findByPk(array('id'=>$genre->genreid,'lang'=>$currLang,'topic'=>'playlist'));
						$title = $traslation->title;
					}
					$genLink = Utilities::buildUserFriendlyURL($urlPrefixGenre,$title,$genre->genreid);
					
					echo CHtml::link($imgGenHtml, array($genLink));
					//echo CHtml::link($imgGenHtml, array('Genres/viewRandomBandsPerGenres','id'=>$genre->GENREID));
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
  <?php echo Yii::t('msg','Are you tired of listening always the same insipid radios? Are you bored to hear low profile music? Discover new music, listen selected sounds, get the music to travel you through years and fantastic worlds, get Staimusic to lead you to in the difficult research of your passions. Follow our playlists and starting from them explore groups, genres, themes, ideas and fashions. The music is not just a pure listening, it\'s thinking, it\'s history, it\'s concepts, it\'s revolution, it\'s a powerful drug that stimulates us in everyday life: enjoy it!.')?>
<h1><?php echo Yii::t('msg','DON\'T WASTE YOUR TIME, LIVE THE MUSIC!')?></h1>

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
			var currentTagsPage = 1;
			var plistPage = 1;
			var gensPage = 1;
			var totalTags = <?php echo Yii::app()->user->getState('countTags');?>;
			var totalPlist = <?php echo Yii::app()->user->getState('countPlists');?>;
			var totalGenres = <?php echo Yii::app()->user->getState('countGenres');?>;
			var _baseUrl = '<?php echo Yii::app()->request->baseUrl ?>';
			//$("#jcarousel-prev-div").css('visibility','hidden');
			//$("#jcarousel-prev-btn").css('visibility','hidden');

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
					//$("#jcarousel-prev-div").css('visibility','visible');
					//$("#jcarousel-prev-btn").css('visibility','visible');
					tagsPage++;
					currentTagsPage++;
					//alert(currentTagsPage);
					//myjcarousel.jcarousel('scroll','+=5');
					$('.jcarousel-next').jcarouselControl({
        				target: '+=5'
    				});
					//$("#jcarousel-prev-btn").show();
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
									var tagNameEnc = encodeURIComponent(elem.tagname);
									var descEnc = encodeURIComponent(elem.description);
									var imgPathEnc = encodeURIComponent(elem.imagepath);
									var tagId = elem.tagid;
									var ouputStr = buildUserFriendlyURL("/index.php/tag-musica/",elem.tagname,tagId);
									//var urlComplete = url + "/id/"+tagId;
									//html += "<li><a href='index.php/Playlists/viewPlPerTag/id/"
									//alert(outputStr2);
									html += "<li><a href='"+_baseUrl+ouputStr+"'><div class='tag'>" + elem.tagname + 
	                                "</div> <div class='text'>"+ elem.description +"</div> "
	                                +"<img src='"
	                                +elem.imagepath+"' alt='' /></a></li>";
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

			$("#jcarousel-prev-btn").click(function(e)
			{
				currentTagsPage--;
				//alert(currentTagsPage);
				//if(currentTagsPage<2){
				//	$("#jcarousel-prev-div").css('visibility','hidden');
				//	$("#jcarousel-prev-btn").css('visibility','hidden');
				//}
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
	                                var plTitle = elem.pltitle;
	                                var plId = elem.plid;
	                                //var urlComplete = url + "/id/"+ plId;
	                                var ouputStr = buildUserFriendlyURL("/index.php/playlist-musicali/",plTitle,plId); 
	                                if(elem.pltitle.length>50){
	                                	plTitle = elem.pltitle.substring(0,50) + " ...";
	                                }
									var tagNameEnc = encodeURIComponent(plTitle);
									var descEnc = encodeURIComponent(elem.description);
									var imgPathEnc = encodeURIComponent(elem.imagepath);
									html += "<li><a href='"+_baseUrl+ouputStr+"'><div class='tag'>" + plTitle + 
	                                "</div><div class='text'>"+ elem.description +"</div>"
	                                +"<img src='"
	                                +elem.imagepath+"' alt='' /></a></li>";
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
	                                var genName = elem.genrename;
									var tagNameEnc = encodeURIComponent(genName);
									var genId = elem.genreid;
									var ouputStr = buildUserFriendlyURL("/index.php/generi-musicali/",genName,genId);
									//alert(url);
									//var urlComplete = url + "/id/"+genId;
									html += "<li><a href='"+_baseUrl+ouputStr+"'><img src='"+elem.imagepath+"' alt='' /></a></li>";
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

            function setAlphOrder(){
                alert("setAlphOrder");
            	<?php Yii::app()->user->setState('orderByClause', 'A'); ?>
			}

            function setRandomOrder(){
            	<?php Yii::app()->user->setState('orderByClause', 'R'); ?>
			}
            
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

			function buildUserFriendlyURL(prefix,inputStr,id)
			{
				//alert(inputStr);
				var outputStr = inputStr;
				var inArray = ["'",",",";",":","!","%"];
				outputStr = outputStr.replace(new RegExp(" ",'g'),'-');
				outputStr = outputStr.replace(new RegExp("'",'g'),'-');
				inArray.forEach(function( word ){
					outputStr = outputStr.replace(new RegExp(word,'g'),'');
				});

				var tagLink = prefix+outputStr+"_"+ id+".html";
				return tagLink.toLowerCase();
				//alert(outputStr);
				//return outputStr;
			}
			
           	function searchTag(e,search_input)
            {
           		<?php unset(Yii::app()->session['bandsIdStr']);?>
            	var rawData;
            	var imgPathPref = '<?php echo Yii::app()->request->baseUrl ?>';    
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
	                            	$("#myCarousel").append("<div class='NON TROVATI'><?php echo Yii::t('msg','Tag not found')?></div>");
		                        }else{
		                        	$(".jcarousel-prev").show();
		                        	$(".jcarousel-next").show();
		                        	$("#jcarousel-next-btn").show();
	                            	$("#jcarousel-prev-btn").show();
			                    }
	                          //$.each(response.dataProvider.rawData, function(i, elem){
	                            $.each(response.filterTags, function(i, elem){
									var tagNameEnc = encodeURIComponent(elem.tagname);
									var descEnc = encodeURIComponent(elem.description);
									var imgPathEnc = encodeURIComponent(elem.imagepath);
									var imgPath = imgPathPref + '/' +  elem.imagepath;
									var tagId = elem.tagid;
									//var url = "<?php echo Yii::app()->createUrl('Playlists/viewPlPerTag')?>";
									//var urlComplete = url + "/id/"+tagId;
									var ouputStr = buildUserFriendlyURL("/index.php/tag-musica/",elem.tagname,tagId);
									$("#myCarouselUl").append("<li><a href='"+imgPathPref+ouputStr+"'><div class='tag'>" + elem.tagname + 
	                                            "</div>"
	                                            +"<img src='"
	                                            +imgPath+"' alt='' /></a></li>");
	                                count++;
	                  			});
	                  			//$("#myCarouselUl").append("<li><a href='index.php?r=Playlists/viewPlPerTag&amp;tagid="
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
	                    	    	$("#myCarousel-plist").append("<div><?php echo Yii::t('msg','Playlist not found')?></div>");
		                    	}else{
		                    		$(".jcarousel-plist-prev").show();
		                    	    $(".jcarousel-plist-next").show();
		                    		$("#jcarousel-plist-next-btn").show();
	                    	    	$("#jcarousel-plist-prev-btn").show();
			                    }
	                    	    $.each(response.filterPlist, function(i, elem){
		                    	    var plTitle = elem.pltitle;
		                    	    if(elem.pltitle.length>50){
										plTitle = elem.pltitle.substring(0,50) + " ...";					
			                    	} 
	                    	    	var tagNameEnc = encodeURIComponent(plTitle);
									var descEnc = encodeURIComponent(elem.description);
									var imgPathEnc = encodeURIComponent(elem.imagepath);
									var imgPath = imgPathPref + '/' +  elem.imagepath;
									var plId = elem.plid;
	                                //var url = "<?php echo Yii::app()->createUrl('Playlists/view2')?>";
	                                //var urlComplete = url + "/id/"+ plId;
	                                var ouputStr = buildUserFriendlyURL("/index.php/playlist-musicali/",plTitle,plId);
									//$("#myCarousel-plistUl").append("<li><a href='index.php?r=Playlists/view2&amp;id="
									$("#myCarousel-plistUl").append("<li><a href='"+imgPathPref+ouputStr+"'><div class='tag'>" + elem.pltitle + 
	                                            "</div><div class='text'>"+ elem.description +"</div>"
	                                            +"<img src='"
	                                            +imgPath+"' alt='' /></a></li>");
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
	                    	    	$("#myCarousel-gen").append("<div><?php echo Yii::t('msg','Genre not found')?></div>");
		                    	}else{
		                    		$(".jcarousel-gen-prev").show();
		                    	    $(".jcarousel-gen-next").show();
		                    		$("#jcarousel-gen-next-btn").show();
	                    	    	$("#jcarousel-gen-prev-btn").show();
			                    }
	                    	    $.each(response.filterGen, function(i, elem){
	                    	    	var tagNameEnc = encodeURIComponent(elem.genrename);
									var descEnc = encodeURIComponent(elem.description);
									var imgPathEnc = encodeURIComponent(elem.imagepath);
									var imgPath = imgPathPref + '/' +  elem.imagepath;
									var genId = elem.genreid;
									//var url = "<?php echo Yii::app()->createUrl('Genres/viewRandomBandsPerGenres')?>";
									//var urlComplete = url + "/id/"+genId;
									var ouputStr = buildUserFriendlyURL("/index.php/generi-musicali/",elem.genrename,genId);
									$("#myCarousel-genUl").append("<li><a href='"+imgPathPref+ouputStr+"'><img src='"
	                                            +imgPath+"' alt='' /></a></li>");
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


