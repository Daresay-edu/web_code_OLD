<?php
    $dir="../book/";
	$i=1;
	$end_page=200;
	for ($i;$i<=$end_page;$i++) {
		rename($dir."Journeys G1 Student Edition Book 1-".$i.".jpg", $i.".jpg");
    }
?>