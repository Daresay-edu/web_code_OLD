<html>
<head>
	<title>DX Video Player</title>
</head>
<?php
	$color_arr=array("#FFEC8B","#FFBBFF","#BFEFFF","#98FB98","#F4A460");
	$arr=range(0,4);
	shuffle($arr);
	$bg_color=$color_arr[$arr[0]];
	echo "<body bgcolor='$bg_color'>";
?>
<center>

<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-4445535411111'  codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0'  width=500 height=400 >
      <param name='movie' value='flvplayer.swf' />
      <param name='quality' value='high' />
      <param name='allowFullScreen' value='true' />
	<?php
		$source="../".$_POST["source"];
		echo "<param name='FlashVars' value='vcastr_file=$source&IsAutoPlay=1&IsContinue=1&LogoText=Daresay Education' />
			  <embed src='flvplayer.swf' allowfullscreen='true' flashvars='vcastr_file=$source&IsAutoPlay=1&IsContinue=1&LogoText=Daresay Education' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash'  width='90%' height='90%' />";
	 ?>

</object>
<br/>
<a href="#" onClick="javascript :history.back(-1);"><image src='../images/goback.gif' height='30' width='30'/></a>
</center>
</body>
</html>
