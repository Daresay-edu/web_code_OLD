<?php
	$source="../".$_POST['notebook_source'];
	if(file_exists($source)) {
		echo $source." exists.<br/>";
		exec($source);
		//echo "The program has been opened, you can close this window.";
		echo "Success!";
	} else {
		echo $source." does not exist.";
	}
	
?>