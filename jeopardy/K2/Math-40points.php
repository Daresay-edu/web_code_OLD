<html>
<head>
<script>
	function checkansweryes() {
		var audio = document.getElementById("yes");
		audio.play();
		document.getElementById("checkanswer").style.display="none";
		document.getElementById("answer").style.display="inline";
		document.getElementById("yesimg").style.display="inline";
	
	}
	function checkanswerno() {
		var audio = document.getElementById("no");
		audio.play();
		document.getElementById("checkanswer").style.display="none";
		document.getElementById("noimg").style.display="inline";
		document.getElementById("answer").style.display="inline";
	}
</script>
</head>
<?php
	$color_arr=array("#FFEC8B","#FFBBFF","#BFEFFF","#98FB98","#F4A460");
	$arr=range(0,4);
	shuffle($arr);
	$bg_color=$color_arr[$arr[0]];
	echo "<body bgcolor='$bg_color'>";
?>
<center>
<br/><br/>
<?php
	$question="There are 8 students reading books, 10 students <br/> doing homework, how many students are there all together? ";
	$answer="There are 18 students all together, because 
8+10=18. ";
?>
<table>
	<tr>
		<td><h1>Q: <?php echo $question;?></h1></td>
	</tr>
	<tr id='checkanswer'>
		<td align='center' >
			<a href='#' onclick='checkansweryes()'><h2>Yes</h2></a>
			<a href='#' onclick='checkanswerno()'><h2>No</h2></a>
		</td>
	</tr>
	<tr id='answer' style='display:none'>
		<td ><h1>A: <?php echo $answer;?><h1></td>
	</tr>
	<tr id='yesimg' style='display:none'>
		<td align='center'>You are
			<img src='image/yes.jpg' width='80px' height='80px'/>
		</td>
	</tr>
	<tr id='noimg' style='display:none'>
		<td align='center'>You are 
			<img src='image/no.jpg' width='50px' height='50px'/>
		</td>
	</tr>
	<tr>
		<td><audio id='yes' playcount="10" loop='loop'> 
				<source src="./huanhu.mp3"/>
			</audio>
			<audio id='no' playcount="10" loop='loop'> 
				<source src="./"/>
			</audio>
		</td>
	</tr>
	<tr id='clap' style='display:none'>
		<td align='center'><embed src="flash4381.swf" width="100" height="80"></embed></td>
	</tr>
</table>
</center>

</body>
</html>