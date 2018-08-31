<?php
function display_source($photo_list, $real_list, $name_list) {
	include "videos_games_arrays.php";
	$i=0;
	$print_tr=0;
	$td_num=0;
	$photo_width=237;
	$photo_height=148;
	
	echo "<input type='hidden' name='source' id='source' value='def'/>";
	foreach ($photo_list as $K=>$V) {
		//3 vedioes in a line
		if ($i%3 == 0) {
			echo "<tr>";
		}
		if (strstr($real_list[$i], 'http') || strstr($real_list[$i], '.swf')||
				strstr($real_list[$i], '.html') ) { //outside source

			echo "<td>&nbsp;&nbsp;<a href=\"$real_list[$i]\" target=\"\">";
			echo "<img src=\"$V\" width=\"$photo_width\"  height=\"$photo_height\" alt=\"tour\"       
				style=\"margin-bottom:4px\" title=\"$name_list[$i]\"/>";
			echo"</a></td>";

		} else if(strstr($real_list[$i],'php')){
			echo "<td>&nbsp;&nbsp;<a href=\"$real_list[$i]\" 
				style=\"width:52px;height:330px\">";
			echo "<img src=\"$V\" width=\"$photo_width\"  height=\"$photo_height\" alt=\"tour\"
				style=\"margin-bottom:4px\" title=\"$name_list[$i]\"/>";
			echo"</a></td>";
		} else { //vedios or swf
			echo "<td>&nbsp;&nbsp;<a href='#' target='_self' id='../teach_source/$real_list[$i]' onClick='javascript:return playvideo(this.id);'
				style='width:52px;height:330px'>";
				
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

}
function display_source1($photo_list, $real_list, $name_list,$type) {
	include "videos_games_arrays.php";
	$i=0;
	$print_tr=0;
	$td_num=0;
	$photo_width=237;
	$photo_height=148;
	echo "<table>";
	if($type=="video") {
		echo "<form name='videoplay' method='post' action='public/playvideo.php'>";
		echo "<input type='hidden' name='source' id='source' value='def'/>";
		echo "</form>";
	}
	foreach ($photo_list as $K=>$V) {
		//3 vedioes in a line
		if ($i%3 == 0) {
			echo "<tr>";
		}
		if (strstr($real_list[$i], 'http') || strstr($real_list[$i], '.swf')||
				strstr($real_list[$i], '.html') ) { //outside source

			echo "<td>&nbsp;&nbsp;<a href=\"$real_list[$i]\" target=\"\">";
			echo "<img src=\"$V\" width=\"$photo_width\"  height=\"$photo_height\" alt=\"tour\"       
				style=\"margin-bottom:4px\" title=\"$name_list[$i]\"/>";
			echo"</a></td>";

		} else if(strstr($real_list[$i],'php')){
			echo "<td>&nbsp;&nbsp;<a href=\"$real_list[$i]\"
				style=\"width:52px;height:330px\">";
			echo "<img src=\"$V\" width=\"$photo_width\"  height=\"$photo_height\" alt=\"tour\"
				style=\"margin-bottom:4px\" title=\"$name_list[$i]\"/>";
			echo"</a></td>";
		} else { //vedios or swf
			echo "<td>&nbsp;&nbsp;<a href='#' target='_self' id='../teach_source/$real_list[$i]' onClick='javascript:return playvideo(this.id);'
				style='width:52px;height:330px'>";
				
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
	echo "</table>";

}
function display_source_by_filename($dir_path, $type) {
	$index=1;
	$i=0;
	$print_tr=0;
	$td_num=0;
	$photo_width=237;
	$photo_height=148;
	$png_file="";
	$source_file="";
	$video_file="";
	echo "<table>";
	switch($type) {
		case "reading":
			$dir_path=$dir_path.$type;
			echo "<form name='pictureplay' method='post' target='picWindow' action='public/playpicture.php'>";
			echo "<input type='hidden' name='source_dir' id='source_dir' value='def'/>";
			echo "<input type='hidden' name='begin_page' id='begin_page' value='def'/>";
			echo "<input type='hidden' name='end_page' id='end_page' value='def'/>";
			echo "</form>";
			if (is_dir($dir_path)) {
				$filesnames = scandir($dir_path);
				if ($filesnames != false) {
					while(1) {
						$find=0;
						foreach ($filesnames as $filename) {
								if ($filename != "." && $filename != "..") {
									//the file name must begin like "1-","2-","3-" ...
									$array_str=explode('-',$filename); //picture name like 1-1&44.jpg
									
									if ($array_str[0] != $index)
										continue;
									if (strstr($filename,".png")||strstr($filename,".jpg")) {
										$png_file=$dir_path."/".$filename;
										$find=1;
										$page_range=explode('.',$array_str[1]); //array_str is 1&44.jpg
										$page_num=$page_range[0];//get 1&44 string
										break;
										
									}
								}
						}
								//display the source
						if ($find==0) {
							break;
						} else {

							//3 vedioes in a line
							if ($i%3 == 0) {
								echo "<tr>";
							}
							
								echo "<td>&nbsp;&nbsp;<a href='#' target='' id='$dir_path&$page_num' onClick='javascript:return playpicture(this.id);'
									style='width:52px;height:330px'>";
									
								echo "<img src=\"$png_file\" width=\"$photo_width\"  height=\"$photo_height\" alt=\"tour\"
									style=\"margin-bottom:4px\" title=\"$filename\"/>";
								echo"</a></td>";
								
							
														//3 videos in a line
						}
								$td_num++;
								if ($td_num == 3) {
									echo "</tr>";
									$td_num=0;
								}
								$png_file="";
								$source_file="";
								$index++;
								$i++;
					}
				}
			}
			break;
		default://notebook,video,game
			$dir_path=$dir_path.$type;
			if($type=="video") {
				echo "<form name='videoplay' method='post' action='public/playvideo.php'>";
				echo "<input type='hidden' name='source' id='source' value='def'/>";
				echo "</form>";
			} 
			if ($type=="notebook") {
				echo "<form name='notebookrun' method='post' action='public/runnotebook.php'>";
				echo "<input type='hidden' name='notebook_source' id='notebook_source' value='def'/>";
				echo "</form>";	
			}
			if ($type=="game") {
			    echo "<form name='exerun' method='post' action='public/runexe.php'>";
				echo "<input type='hidden' name='exe_source' id='exe_source' value='def'/>";
				echo "</form>";	
			}
			
			if (is_dir($dir_path)) {
				$filesnames = scandir($dir_path);
				if ($filesnames != false) {
					while(1) {
						$find=0;
						//print_r($filesnames);
						foreach ($filesnames as $filename) {
							if ($filename != "." && $filename != "..") {
								//the file name must begin like "1-","2-","3-" ...
								$array_str=explode('-',$filename);
								if ($array_str[0] != $index)
									continue;
								if (strstr($filename,".png")||strstr($filename,".jpg")) {
									$png_file=$dir_path."/".$filename;
					
								} else{
									$source_file=$dir_path."/".$filename;
								}
								if (!empty($png_file) && !empty($source_file))
								{
									$find=1;
									break;
									
								}
							}
						}
						
							//display the source
						if ($find==0) {
							break;
						} else {

							//3 vedioes in a line
							if ($i%3 == 0) {
								echo "<tr>";
							}
							if (strstr($source_file, 'http') || strstr($source_file, '.swf')||
								strstr($source_file, '.html') ) { //outside source
								echo "<td>&nbsp;&nbsp;<a href=\"$source_file\" target=\"\">";
								echo "<img src=\"$png_file\" width=\"$photo_width\"  height=\"$photo_height\" alt=\"tour\"       
									style=\"margin-bottom:4px\" title=\"$filename\"/>";
								echo"</a></td>";


							}else if(strstr($source_file,'php')){ 							
									echo "<td>&nbsp;&nbsp;<a href=\"$source_file\" 
										style=\"width:52px;height:330px\">";
									echo "<img src=\"$png_file\" width=\"$photo_width\"  height=\"$photo_height\" alt=\"tour\"
										style=\"margin-bottom:4px\" title=\"$filename\"/>";
									echo"</a></td>";
							} else if (strstr($source_file,'notebook')) {
								echo "<td>&nbsp;&nbsp;<a href='#' target='_self' id='$source_file' onClick='javascript:return runnotebook(this.id);'
									style='width:52px;height:330px'>";
									
								echo "<img src=\"$png_file\" width=\"$photo_width\"  height=\"$photo_height\" alt=\"tour\"
									style=\"margin-bottom:4px\" title=\"$filename\"/>";
								echo"</a></td>";
							} else if (strstr($source_file,'.exe') || strstr($source_file,'.bat')) {
							
								echo "<td>&nbsp;&nbsp;<a href='#' id='$source_file' onClick='javascript:return runexe(this.id);'
									style='width:52px;height:330px'>";
									
								echo "<img src=\"$png_file\" width=\"$photo_width\"  height=\"$photo_height\" alt=\"tour\"
									style=\"margin-bottom:4px\" title=\"$filename\"/>";
								echo"</a></td>";
							}else {
								echo "<td>&nbsp;&nbsp;<a href='#' target='_self' id='$source_file' onClick='javascript:return playvideo(this.id);'
									style='width:52px;height:330px'>";
									
								echo "<img src=\"$png_file\" width=\"$photo_width\"  height=\"$photo_height\" alt=\"tour\"
									style=\"margin-bottom:4px\" title=\"$filename\"/>";
								echo"</a></td>";
								
							}
														//3 videos in a line
						}
								$td_num++;
								if ($td_num == 3) {
									echo "</tr>";
									$td_num=0;
								}
								$png_file="";
								$source_file="";
								$index++;
								$i++;
								
					}
					
				}
			}
			break;
	}
	echo "</table>";
}

?>
