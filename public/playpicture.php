<html>
<head>

<!-- content type -->
<meta content="text/html; charset=gb2312" http-equiv="Content-Type">

<!-- viewport -->
<meta content="width=device-width,initial-scale=1" name="viewport">
   
<!-- title -->
<title>DX Picture Player</title>
			
<!-- add css -->
<link type="text/css" href="../css/style_pic.css" rel="stylesheet">



<!-- add js -->
<script src="../js/jquery.js"></script>
<script src="../js/turn.js"></script>              
<script src="../js/jquery.fullscreen.js"></script>
<script src="../js/jquery.address-1.6.min.js"></script>
<script src="../js/onload.js"></script>
<script>
function listenaudio(id){
	var audio_id=id+"audio";
	var audio=document.getElementById(audio_id);
	var play_id=id+"playing";
	var playing=document.getElementById(play_id);
	if (audio.paused) {
		audio.play();
		playing.style.display="inline";
	} else {
		audio.pause();
		playing.style.display="none";
	}
}
function displayaudio(id){
	var audio_id=id+"audio";
	var audio=document.getElementById(audio_id);
	if (audio.style.display=="none") {
		audio.style.display="inline";
	} else {
		audio.style.display="none";
	}
}
function displayvideo(id){
	var video_id=id+"video";
	var video=document.getElementById(video_id);
	if (video.style.display=="none") {
		video.style.display="inline";
	} else {
		video.style.display="none";
		video.pause();
	}
}
</script>


<style>
html, body {
	margin: 0;
	padding: 0;
	overflow:auto !important;
}
</style> 
  
</head>

<body>  
<!-- BEGIN FLIPBOOK STRUCTURE -->   
<div data-template="true" data-cat="book7" id="fb7-ajax">  
         
    <!-- BEGIN HTML BOOK -->     
    <div data-current="book7" class="fb7" id="fb7">      
        <!-- preloader -->
        <div class="fb7-preloader">
			
            <div id="wBall_1" class="wBall">
            <div class="wInnerBall">
            </div>
            </div>
            <div id="wBall_2" class="wBall">
            <div class="wInnerBall">
            </div>
            </div>
            <div id="wBall_3" class="wBall">
            <div class="wInnerBall">
            </div>
            </div>
            <div id="wBall_4" class="wBall">
            <div class="wInnerBall">
            </div>
            </div>
            <div id="wBall_5" class="wBall">
            <div class="wInnerBall">
            </div>
            </div>
        </div>
              
        <!-- background for book -->  
        <div class="fb7-bcg-book"></div>               
      
        <!-- BEGIN CONTAINER BOOK -->
        <div id="fb7-container-book">
           <!-- BEGIN deep linking -->  
           <section id="fb7-deeplinking">
             <ul>
				<?php 
					$home_dir="../".$_POST["source_dir"];
					$begin_page=$_POST["begin_page"];
					$end_page=$_POST["end_page"];
					$i=1;
					for ($i;$i<=$end_page;$i++) {
						
				?>
                 <li data-address="<?php echo "page".$i?>" data-page="<?php echo $i?>"></li>
				<?php } ?>
             </ul>
           </section>
           <!-- END deep linking -->  
        
            
           <!-- BEGIN ABOUT -->
           <section id="fb7-about">
					<?php
						//read the menu
						$menu_file=$home_dir."/menu.php";
						if (file_exists($menu_file)) {
							include($menu_file);
							foreach($menu as $title=>$link) {
								echo "<h1><a href='http://localhost/daresay/web_code/public/playpicture.php#book7/page$link' style='text-decoration:none'>*$title</a></h1><br/>";	
							
							}
						} else {
							echo "<H1>Daresay book reading system.<h1/>";
						}
					?>
           </section>
           <!-- END ABOUT -->
    
    
            <!-- BEGIN PAGES -->
            <div id="fb7-book">
					
					<?php 
						$i=$begin_page;
						for ( $i;$i<=$end_page;$i++) {
							
					?>
				
								<div style="background-image:url(<?php echo $home_dir."/image/".$i?>.jpg)" class="fb7-noshadow">
									<?php
										$found_audio=0;
										$audio_dir=$home_dir."/audio/";
										if (is_dir($audio_dir)) {
											$filesnames = scandir($audio_dir);
											if ($filesnames != false) {
												foreach ($filesnames as $filename) {
													if (strcmp($filename,$i.".mp3") == 0) { 
														$found_audio=1;
														break;
													}
												}
											}
										}
										$found_video=0;
										$audio_dir=$home_dir."/video/";
										if (is_dir($audio_dir)) {
											$filesnames = scandir($audio_dir);
											if ($filesnames != false) {
												foreach ($filesnames as $filename) {
													if (strcmp($filename,$i.".mp4") == 0) { 
														$found_video=1;
														break;
													}
												}
											}
										}
										if ($found_audio == 1) {
									?>
									<center>
									<img src='../images/playing.jpg'  style='display:none' id='<?php echo $i."playing";?>' width='20px' height='20px'/>
									<a href='javascript:void(0);' id='<?php echo $i;?>' onClick='javascript:listenaudio(this.id)'><img src='../images/v.png' width='20px' height='20px'/></a>
									<a href='javascript:void(0);' id='<?php echo $i;?>' onClick='javascript:displayaudio(this.id)'><img src='../images/c.png' width='18px' height='18px'/></a>
									<?php }?>
									<?php
										if ($found_video == 1) {
									?>
									<a href='javascript:void(0);' id='<?php echo $i;?>' onClick='javascript:displayvideo(this.id)'><img src='../images/t.png' width='16px' height='16px'/></a>
									<video id='<?php echo $i."video";?>' width="320" height="160" style='display:none' src='<?php echo $home_dir."/video/".$i?>.mp4' controls>
									</video>
									<?php }?>
									<?php
										if ($found_audio == 1) {
									?>
									<audio id='<?php echo $i."audio";?>' controls='controls' style='display:none' playcount="10" style="width:260px;;bottom:0px;">
										<source src="<?php echo $home_dir."/audio/".$i?>.mp3"/>
									<audio></center>
									 <!-- begin container page book --> 
									<div class="fb7-cont-page-book">
                           
										<!-- description for page --> 
										<div class="fb7-page-book">
                        
										</div> 
										
                            
									</div>
									<?php } ?>
									
								<!-- end container page book --> 
								</div>
					<?php }?>
                    <!-- BEGIN PAGE 1 -->  				
						
					<!-- END PAGE 1 -->

                    <!-- BEGIN PAGE 10 -->          
                    <div style="background-image:url()">
                           
                         <!-- begin container page book --> 
                         <div class="fb7-cont-page-book">
                           
                                <!-- description for page--> 
                                <div class="fb7-page-book">
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <h1 style="padding-left: 150px;">&nbsp;THE END</h1>                    
                                </div> 
                                    
                         </div>
                         <!-- end container page book -->
                            
                    </div>
                    <!-- END PAGE 10 -->
                                  
           
            
            </div>
            <!-- END PAGES -->
                       
            
            <!-- arrows -->
            <a class="fb7-nav-arrow prev"></a>
            <a class="fb7-nav-arrow next"></a>
                    
            <!-- shadow -->
            <div class="fb7-shadow"></div>
    
        </div>
        <!-- END CONTAINER BOOK -->
    
        <!-- BEGIN FOOTER -->
        <div id="fb7-footer">
        
            <div class="fb7-bcg-tools"></div>
            
            <div class="fb7-menu" id="fb7-center">
                <ul>
                
                    <!-- margin left -->
                    <li></li>
                            
                    <!-- icon download -->
                    <li>
                        <a title="Pdf File Or Zip" class="fb7-download" href="#"></a>
                    </li>
                                            
                    
                    <!-- icon_zoom_in -->                         
                    <li>
                        <a title="Zoom In" class="fb7-zoom-in"></a>
                    </li>
                                    
                    
                    <!-- icon_zoom_out -->                 
                    <li>
                        <a title="Zoom Out" class="fb7-zoom-out"></a>
                    </li>
                                    
                    
                    <!-- icon_zoom_auto -->
                    <li>
                        <a title="Zoom Auto" class="fb7-zoom-auto"></a>
                    </li>
                                    
                    
                    <!-- icon_zoom_original -->
                    <li>
                        <a title="Zoom Original (Scale 1:1)" class="fb7-zoom-original"></a>
                    </li>
                                     
                    
                    <!-- icon_allpages -->
                    <li>
                        <a title="Show All Pages " class="fb7-show-all"></a>
                    </li>
                                                    
                    
                    <!-- icon_home -->
                    <li>
                        <a title="Show Home Page" class="fb7-home"></a>
                    </li>
                                    
                    <!-- icon fullscreen -->                 
                    <li>
                        <a title="Full / Normal Screen" class="fb7-fullscreen"></a>
                    </li>
                            
                    <!-- margin right -->                 
                    <li></li>
                    
                </ul>
            </div>
            
            <div class="fb7-menu" id="fb7-right">
                <ul>                              
                    <!-- icon page manager -->                 
                    <li class="fb7-goto">
                        <label for="fb7-page-number" id="fb7-label-page-number"></label>
                        <input type="text" id="fb7-page-number">
                        <button type="button">Go</button>
                    </li>
         
                </ul>
            </div>     
                
        </div>
        <!-- END FOOTER -->
    
        <!-- BEGIN THUMBS -->
        <div id="fb7-all-pages" class="fb7-overlay">
    
          <section class="fb7-container-pages">
    
            <div id="fb7-menu-holder">
    
                <ul id="fb7-slider">
						<?php
							$j=1;
							$i=$begin_page;
							for ($i;$i<=$end_page;$j++,$i++) {
						?>
                         <!-- PAGE 1 - THUMB -->
                         <li class="<?php echo $j?>">
                           <img alt="" src="<?php echo $home_dir."/image/".$i?>.jpg">
                         </li>
						<?php } ?>

                         
                         <!-- PAGE 10S - THUMB -->
                         <li class="<?php echo $end_page+1?>">
                           <img alt="" src="../images/end_.jpg">
                         </li>
          
                </ul>
            
            </div>
    
        </section>
    
       </div>
        <!-- END THUMBS -->

   </div>
    <!-- END HTML BOOK -->    
    
    
</div>
<!-- END FLIPBOOK STRUCTURE --> 


<!-- CONFIGURATION FLIPBOOK -->    
<script>
jQuery('#fb7-ajax').data('config',
    {
		"page_width":"640",
		"page_height":"920",
		"go_to_page":"Page",
		"gotopage_width":"45",
		"zoom_double_click":"1",
		"zoom_step":"0.06",
		"tooltip_visible":"true",
		"toolbar_visible":"true",
		"deeplinking_enabled":"true",
		"double_click_enabled":"true",
		"rtl":"false"
     })
</script>


</body>
</html>