	  <div id="menu">
            <ul>    
               <li><a href="mailto:info@sintesilogica.com" title="">contatti</a></li>                                    
  <?PHP


			
												
					if(($_SERVER['SCRIPT_NAME']=="/greefies/object-design.php") ||($_SERVER['SCRIPT_NAME']=="/object-design.php") )
               			{echo "<li><a class=\"current\" href=\"object-design.php\" >object design</a></li>";}
   						else{ echo "<li><a href=\"object-design.php\" >object design</a></li>";}
						
										if(($_SERVER['SCRIPT_NAME']=="/greefies/editoria.php") ||($_SERVER['SCRIPT_NAME']=="/editoria.php") )
               			{echo "<li><a class=\"current\" href=\"editoria.php\" >stampa</a></li>";}
   						else{ echo "<li><a href=\"editoria.php\" >stampa</a></li>";}
							
							
										if(($_SERVER['SCRIPT_NAME']=="/greefies/grafica.php") ||($_SERVER['SCRIPT_NAME']=="/grafica.php") )
               			{echo "<li><a class=\"current\" href=\"grafica.php\" >grafica</a></li>";}
   						else{ echo "<li><a href=\"grafica.php\" >grafica</a></li>";}
	
																		
					if(($_SERVER['SCRIPT_NAME']=="/greefies/multimedia.php") ||($_SERVER['SCRIPT_NAME']=="/multimedia.php") )
               			{echo "<li><a class=\"current\" href=\"multimedia.php\" >web</a></li>";}
   						else{ echo "<li><a href=\"multimedia.php\" >web</a></li>";}
						
                   if(($_SERVER['SCRIPT_NAME']=="/greefies/index.php") || ($_SERVER['SCRIPT_NAME']=="/")  || ($_SERVER['SCRIPT_NAME']=="/index.php") )
               			{echo "<li><a class=\"current\" href=\"index.php\" >chi siamo</a></li>";}
   						else{ echo "<li><a href=\"index.php\" >chi siamo</a></li>";}
						

 
 ?>

             

 
  </ul>
        </div>
