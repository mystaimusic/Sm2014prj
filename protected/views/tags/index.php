<!-- <h1>Tags</h1> -->
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




<div class="container darkbg">
<div id="headercont">

<div id="mod_mainsearch">
<div id="loading" style="margin: 4px 0;display:none;">loading...</div>
				<div id="search" style="margin: 10px 0;">What makes your body move...and your heart beating?
					<input type="text" class='search_input'/><button type="button" class='search_button'>Go</button><br/></div>
				<div id="result"></div>

</div><!--mod_mainsearch--><br><br><br><br><br>

</div><!--headercont-->
</div><!--container-->











<div class="container">

<div id="maincont" class="clearfix">
	
	<div class="bv_maincont">
	<?php 
		
		foreach($dataProvider->getData() as $tag)
		{
			echo CHtml::tag('ul', array('class'=>'boxview'),false,false);
			echo CHtml::tag('li', array(), false,false);
			echo CHtml::tag('div', array('class'=>'tag'),$tag->TAGNAME,true);
			echo CHtml::tag('div', array('class'=>'text'),$tag->DESCRIPTION,true);
			$imghtml = CHtml::image($tag->IMAGEPATH);
			//echo CHtml::link($imghtml, /*$tag->url*/ '#', array('view','id'=>$tag->TAGID));
			//$nextUrl = CHtml::link($imghtml,$url, array('target'=>'_blank'));
			echo CHtml::link($imghtml, array('Playlists/viewPlPerTag','tagid'=>$tag->TAGID,'tagname'=>$tag->TAGNAME,'imagePath'=>$tag->IMAGEPATH));
			//echo $nextUrl;
			echo CHtml::closeTag('li');
			echo CHtml::closeTag('ul');
		}
		
	?>
	

</div>

<!-- <div id="maincont" class="clearfix">
	
   <div class="bv_maincont"> 
   
 <ul class="boxview"><li>
 <div class="tag">Rebellion</div>
   <div class="text">prova prova</div>
 <img src="images/rebellion2.jpg" alt="playlist1">
 </li>
 </ul>
 
  <ul class="boxview"><li>
   <div class="tag">California</div>
   <div class="text">prova prova</div>
 <img src="images/california.jpg" alt="playlist1">
 </li>
 </ul>
 
  <ul class="boxview"><li>
  <div class="tag">Punk</div>
   <div class="text">prova prova</div>
 <img src="images/punk.jpg" alt="playlist1">
 </li>
 </ul>
 
  <ul class="boxview"><li>
  <div class="tag">Skate</div>
   <div class="text">prova prova</div>
 <img src="images/Skate.jpg" alt="playlist1">
 </li>
 </ul>
 
  <ul class="boxview"><li>
   <div class="tag">Rebellion</div>
   <div class="text">prova prova</div>
 <img src="images/rebellion2.jpg" alt="playlist1">
 </li>
 </ul>
 
  <ul class="boxview"><li>
   <div class="tag">Rebellion</div>
   <div class="text">prova prova</div>
 <img src="images/rebellion2.jpg" alt="playlist1">
 </li>
 </ul>
 
  <ul class="boxview"><li>
   <div class="tag">Rebellion</div>
   <div class="text">prova prova</div>
 <img src="images/rebellion2.jpg" alt="playlist1">
 </li>
 </ul>

</div>
</div>
</div>
-->
<div class="container clearfix">
    <div id="footercont" class="clearfix">
        <p>Staimusic &copy; 2013 - Design by <a title="Sintesilogica" href="http://www.sintesilogica.com/" rel="external">Sintesilogica</a></p>
    </div>
</div>
	<script type="text/javascript">
	//<![CDATA[
		(function($){
	           
	           
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

                        function searchTag(e,search_input)
                        {    
                            alert(search_input);
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
                                                alert(jqXHR.responseText);
                                                /*var videoJSON = new Object();
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
                                                player.player('loadPlaylist', videoJSON);*/
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
</body>
</html>


