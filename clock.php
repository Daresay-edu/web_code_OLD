<script type="text/javascript" src="js/jquery-1.10.2.js"></script>

<link type="text/css" href="css/reset.css"/>

<style type="text/css">
.box{margin:10px auto;width:89px;height:86px;}
.clock{position:relative;width:89px;height:86px;background:url("images/bg.png") no-repeat;}
.second-hand,.minute-hand,.hour-hand{position:absolute;left:50%;margin-left:-6px;top:-13px;width:20px;height:89px;background:url("images/clock_needle.png") no-repeat;}
.second-hand{background-position:-1px 59px;z-index:1000;}
.minute-hand{background-position:-25px 56px;z-index:100;}
.hour-hand{background-position:-54px 56px;z-index:10;}
</style>

<script type="text/javascript">
$(function(){
	var $second = $(".second-hand"), /* ���� */
			$minute = $(".minute-hand"), /* ���� */
			$hour = $(".hour-hand"), /* ʱ�� */
			timer = setInterval(nowTime,1000); /* ѭ�����ã�һ������һ�� */
	function nowTime(){
		function getTime(){
			var now = new Date();
			return {
				hours: now.getHours() + now.getMinutes() / 60, /* Сʱ�������������� */
				minutes: now.getMinutes() + now.getSeconds() / 60, /* ���������������� */
				seconds: now.getSeconds() /* ���� */
			}
		}
		var _date = getTime(); /* ���յ�ʱ����� */
		var _secondRotate = Math.floor(_date.seconds) * 6; /* ���룬һȦ360���ܹ���60�루60�񣩣�һ�루һ�񣩾���6�ȣ�����6����Ҫԭ�������������һ��Ķ��������ܶ��� */
		var _minuteRotate = _date.minutes * 6; /* ���룬һȦ360���ܹ���60���ӣ��������������� */
		var _hourRotate =  (_date.hours % 12) * 30; /* ʱ�룬һȦ360����12��Сʱ��һ��Сʱ����30�ȣ���ʵҲ��5�񣩣�Сʱ������һСʱ�Ķ��������ܶ���������Ҫ���Ǵ���12��Сʱ���������ȡ����12�ķ�������ʵ�� */
		$second.css({"transform":"rotate("+_secondRotate+"deg)"}); /* ����������ת�� */
		$minute.css({"transform":"rotate("+_minuteRotate+"deg)"}); /* ���÷�����ת�� */
		$hour.css({"transform":"rotate("+_hourRotate+"deg)"}); /* ����ʱ����ת�� */
	}

})
</script>
</head>
<body>
<div class="box">
	<div class="clock">
		<div class="second-hand"></div>
		<div class="minute-hand"></div>
		<div class="hour-hand"></div>
	</div>
</div>