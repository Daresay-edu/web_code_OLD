<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>DareSay Education</title>
	<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/flowplayer-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.2.1.pack.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/fancyplayer.js"></script>
    <script type="text/javascript">

	     var videopath = "../teach_source/";
	     var swfplayer = videopath + "player/flowplayer-3.1.1.swf";

    </script>
</head>
<body>
<!-- Header -->
<?php
include("header.php");
?>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">课程</a>
			<span>&gt;</span>
			K2
            <span>&gt;</span>
			Open Class	
		</div>
		<!-- End Small Nav -->
		
		<!-- Message OK -->		
		
		<!-- End Message Error -->
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Videos</h2>
                    			</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="vidoes">
                      			<!-- Add Videos -->
                      			<br/>
					   <table>
                       			      <?php
					        include "videos_games_arrays.php";
							$i=0;
							$print_tr=0;
							$td_num=0;
							$photo_width=237;
							$photo_height=148;
							$photo_list=$k2_openclass_photo_list;
							$real_list=$k2_openclass_real_list;
							$name_list=$k2_openclass_name_list;
							foreach ($photo_list as $K=>$V) {
								 //3 vedioes in a line
								 if ($i%3 == 0) {
									echo "<tr>";
								 }
							      if (strstr($real_list[$i], 'http') || strstr($real_list[$i], '.swf')||
								   strstr($real_list[$i], '.html') ) { //outside source
								   	   
									   echo "<td>&nbsp;&nbsp;<a href=\"$real_list[$i]\" target=\"_blank\">";
									   echo "<img src=\"$V\" width=\"$photo_width\"  height=\"$photo_height\" alt=\"tour\" 		
									   style=\"margin-bottom:4px\" title=\"$name_list[$i]\"/>";
									   echo"</a></td>";
									   
								  
							       } else { //vedios or swf
									echo "<td>&nbsp;&nbsp;<a href=\"$real_list[$i]\" class=\"video_link\" 		
									style=\"width:52px;height:330px\">";
                            						echo "<img src=\"$V\" width=\"$photo_width\"  height=\"$photo_height\" alt=\"tour\" 	
									style=\"margin-bottom:4px\" title=\"$name_list[$i]\"/>";
									echo"</a></td>";
								   }
								 
								//3 videos in a line   
							    $td_num++;
								if ($td_num == 3) {
										echo "</tr>";
										$td_num=0;
								}	
								$i++;
							
							}
							
					   		
                       				?>
                          
                    			</table>
                     
					</div>
					<!-- Table -->
					
				</div>
				<!-- End Box -->
				
			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			<div id="sidebar">
				
				<!-- Box -->
				<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2>Management</h2>
					</div>
					<!-- End Box Head-->
					<?php include("teach_right.php");?>
					
				</div>
				<!-- End Box -->
			</div>
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; 2015 - Daresay</span>
		<span class="right">
			Design by Edward
		</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>
