<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
	$question="Could you tell me something about wolves?<br/>
Are gray wolves only gray? ";
	$answer="one wolf, two wolves<br/>
(1)What are wolves? Wolves are wild dogs. They are bigger than dog. <br/>
(2)live: Wolves live in a den. Wolves live in packs. One pack has a pack leader. <br/>Wolves live in forests, tundra and on prairies. <br/>
(3)Food: deer, moose, elk, caribou， rabbits, beavers. <br/>
(4)Wolves have good hearings and good sense of smelling.<br/>
(5)Are wolves dangerous? Wolves almost never hurt people. <br/>
(6)Cubs chase small animals. <br/>
(7) Red Wolf和Gray Wolf，区别是 <br/>
Red Wolf is nocturnal. Red Wolf has large ears.<br/>
Gray Wolf hunt during the daytime. Gray Wolf不只是gray一种颜色，<br/>还有brown, white, black, and reddish浅红色。";
	$img="null";
?>
<table>
	<tr>
		<td><h1>Q: <?php echo $question;?></h1></td>
	</tr>
	<?php
	if ($img != "null") {
	?>
		<tr>
			<td align='center'> 
			<img src='<?php echo $img;?>' width='460px' height='260px'/>
		</td>
		</tr>
	}
	<?php }?>
	<tr id='checkanswer'>
		<td align='center' >
			<a href='#' onclick='checkansweryes()'><h2>Yes</h2></a>
			<a href='#' onclick='checkanswerno()'><h2>No</h2></a>
		</td>
	</tr>
	<tr id='answer' style='display:none'>
		<td ><h1  style='color:red'>A: <?php echo $answer;?><h1></td>
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
		<td><audio id='yes' playcount="10"> 
				<source src="./huanhu.mp3"/>
			</audio>
			<audio id='no' playcount="10" > 
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