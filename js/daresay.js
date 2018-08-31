function playvideo(source)
{
	
	document.getElementById("source").value = source;
	//LGameWindow = window.open('','videoWindow','top=50%,left=50%,width=900,height=600');
    //LGameWindow.focus();
	document.videoplay.submit();
	return true;

} 

function playpicture(str)
{
	arr=str.split("&");
	document.getElementById("source_dir").value = arr[0];
	document.getElementById("begin_page").value = arr[1];
	document.getElementById("end_page").value = arr[2];
	LGameWindow = window.open('','picWindow','top=50%,left=50%,width=1024,height=768');
    LGameWindow.focus();
	document.pictureplay.submit();
	return true;

} 
function runnotebook(str)
{
	document.getElementById("notebook_source").value = str;
	//LGameWindow = window.open('','exeWindow','width=3,height=3');
    //LGameWindow.focus();
	document.notebookrun.submit();
	return true;

} 
function runexe(str)
{
	//alert(str);
	document.getElementById("exe_source").value = str;
	//LGameWindow = window.open('','exeWindow','width=3,height=3');
    //LGameWindow.focus();
	document.exerun.submit();
	return true;

} 
//获取下次课课时
function getClassnum(classid) {
			
			// 创建XMLHttpRequest对象  
			if (window.XMLHttpRequest)  
			{// code for IE7+, Firefox, Chrome, Opera, Safari 现代浏览器  
				xmlhttp=new XMLHttpRequest();  
			}  
			else  
			{// code for IE6, IE5 用户低版本ie  
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");  
			} 
			 // 设置请求类型,请求地址，以及是否启用异步处理请求，大多数设置开启 true  
			xmlhttp.open("GET","database_opt/get_next_class_hour.php?hour="+classid,true);  
			// 将请求发送至服务器  
			xmlhttp.send();  
			// 处理onreadystatechange事件 我们规定当服务器响应已做好被处理的准备时所执行的任务  
			xmlhttp.onreadystatechange=function()  
			{  
				// 4,200 不知道可以看看上面我贴出来的介绍  
				if (xmlhttp.readyState==4 && xmlhttp.status==200)  
				{
					document.getElementById("begin_class").options.length = 0;
					var set_selected=0;					 
					for(var i=1;i<192;i++) {
						var str=i+"-"+(i+1);
						
						if (set_selected==1) {
							document.getElementById("begin_class").add(new Option(str,str,true,true));
							set_selected=0;
						} else {
							document.getElementById("begin_class").add(new Option(str,str));
						}
						 if (xmlhttp.responseText==str) {
							 set_selected=1;
						 }
						 i++;
					}
				}  
			}  
      
			
}
//获取目前所上课时
function getClassnum1(classid) {
			
			// 创建XMLHttpRequest对象  
			if (window.XMLHttpRequest)  
			{// code for IE7+, Firefox, Chrome, Opera, Safari 现代浏览器  
				xmlhttp=new XMLHttpRequest();  
			}  
			else  
			{// code for IE6, IE5 用户低版本ie  
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");  
			} 
			 // 设置请求类型,请求地址，以及是否启用异步处理请求，大多数设置开启 true  
			xmlhttp.open("GET","database_opt/get_next_class_hour.php?hour="+classid,true);  
			// 将请求发送至服务器  
			xmlhttp.send();  
			// 处理onreadystatechange事件 我们规定当服务器响应已做好被处理的准备时所执行的任务  
			xmlhttp.onreadystatechange=function()  
			{  
				// 4,200 不知道可以看看上面我贴出来的介绍  
				if (xmlhttp.readyState==4 && xmlhttp.status==200)  
				{
					document.getElementById("begin_class").options.length = 0;
					//var set_selected=0;					 
					for(var i=1;i<192;i++) {
						var str=i+"-"+(i+1);
						
						if (xmlhttp.responseText==str) {
							document.getElementById("begin_class").add(new Option(str,str,true,true));
							//set_selected=0;
						} else {
							document.getElementById("begin_class").add(new Option(str,str));
						}
						
						 i++;
					}
				}  
			}  
      
			
}
function getClassMem(classid) {
			// 创建XMLHttpRequest对象  
			if (window.XMLHttpRequest)  
			{// code for IE7+, Firefox, Chrome, Opera, Safari 现代浏览器  
				xmlhttp1=new XMLHttpRequest();
			}  
			else  
			{// code for IE6, IE5 用户低版本ie  
				xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");  				
			} 
			// 设置请求类型,请求地址，以及是否启用异步处理请求，大多数设置开启 true  
			xmlhttp1.open("GET","database_opt/get_class_members.php?mem="+classid,true);  
			// 将请求发送至服务器  
			xmlhttp1.send();  
			// 处理onreadystatechange事件 我们规定当服务器响应已做好被处理的准备时所执行的任务  
			xmlhttp1.onreadystatechange=function()  
			{  
				// 4,200 不知道可以看看上面我贴出来的介绍  
				if (xmlhttp1.readyState==4 && xmlhttp1.status==200)  
				{
					document.getElementById("engname").options.length = 0;
					var str=xmlhttp1.responseText;
					var strs=new Array();
					strs=str.split(";");
					for(var i=0;i<strs.length;i++) {		 
						document.getElementById("engname").add(new Option(strs[i],strs[i]));
					}
				}  
			}  
}
function dis_ab_getClassMem(classid) {
			// 创建XMLHttpRequest对象  
			if (window.XMLHttpRequest)  
			{// code for IE7+, Firefox, Chrome, Opera, Safari 现代浏览器  
				xmlhttp1=new XMLHttpRequest();
			}  
			else  
			{// code for IE6, IE5 用户低版本ie  
				xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");  				
			} 
			// 设置请求类型,请求地址，以及是否启用异步处理请求，大多数设置开启 true  
			xmlhttp1.open("GET","database_opt/get_class_members.php?mem="+classid,true);  
			// 将请求发送至服务器  
			xmlhttp1.send();  
			// 处理onreadystatechange事件 我们规定当服务器响应已做好被处理的准备时所执行的任务  
			xmlhttp1.onreadystatechange=function()  
			{  
				// 4,200 不知道可以看看上面我贴出来的介绍  
				if (xmlhttp1.readyState==4 && xmlhttp1.status==200)  
				{
					document.getElementById("dis_engname").options.length = 0;
					var str=xmlhttp1.responseText;
					var strs=new Array();
					strs=str.split(";");
					document.getElementById("dis_engname").add(new Option("All","All"));
					for(var i=0;i<strs.length;i++) {		 
						document.getElementById("dis_engname").add(new Option(strs[i],strs[i]));
					}
				}  
			}  
}
function mod_del_ab_getClassMem1(classid) {
			// 创建XMLHttpRequest对象  
			if (window.XMLHttpRequest)  
			{// code for IE7+, Firefox, Chrome, Opera, Safari 现代浏览器  
				xmlhttp1=new XMLHttpRequest();
			}  
			else  
			{// code for IE6, IE5 用户低版本ie  
				xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");  				
			} 
			
			// 设置请求类型,请求地址，以及是否启用异步处理请求，大多数设置开启 true  
			xmlhttp1.open("GET","database_opt/get_class_members.php?mem="+classid,true);  
			// 将请求发送至服务器  
			xmlhttp1.send();  
			// 处理onreadystatechange事件 我们规定当服务器响应已做好被处理的准备时所执行的任务  
			xmlhttp1.onreadystatechange=function()  
			{  
				// 4,200 不知道可以看看上面我贴出来的介绍  
				if (xmlhttp1.readyState==4 && xmlhttp1.status==200)  
				{
					document.getElementById("mod_del_engname").options.length = 0;
					var str=xmlhttp1.responseText;
					var strs=new Array();
					strs=str.split(";");
					document.getElementById("mod_del_engname").add(new Option("CAT","CAT"));
					for(var i=0;i<strs.length;i++) {		 
						document.getElementById("mod_del_engname").add(new Option(strs[i],strs[i]));
					}
				}  
			}  
}
function getsomeoneAB() {
			// 创建XMLHttpRequest对象  
			if (window.XMLHttpRequest)  
			{// code for IE7+, Firefox, Chrome, Opera, Safari 现代浏览器  
				xmlhttp1=new XMLHttpRequest();
			}  
			else  
			{// code for IE6, IE5 用户低版本ie  
				xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");  				
			} 
			var str1=document.getElementById("mod_del_classid").value;
			var str2=document.getElementById("mod_del_engname").value;
			var tmp=str1+";"+str2;
			// 设置请求类型,请求地址，以及是否启用异步处理请求，大多数设置开启 true  
			xmlhttp1.open("GET","database_opt/get_ab_hour_through_classid_engname.php?classid_engname="+tmp,true);  
			// 将请求发送至服务器  
			xmlhttp1.send();  
			// 处理onreadystatechange事件 我们规定当服务器响应已做好被处理的准备时所执行的任务  
			xmlhttp1.onreadystatechange=function()  
			{  
				// 4,200 不知道可以看看上面我贴出来的介绍  
				if (xmlhttp1.readyState==4 && xmlhttp1.status==200)  
				{
					document.getElementById("ab_hour").options.length = 0;
					var str=xmlhttp1.responseText;
					var strs=new Array();
					strs=str.split(";");
					for(var i=0;i<strs.length;i++) {		 
						document.getElementById("ab_hour").add(new Option(strs[i],strs[i]));
					}
				}  
			}  
}
 function addAbsent(classid) {
	 getClassMem(classid);
	 getClassnum1(classid);
 }
 window.document.oncontextmenu = function(){ 
    return false;
}