<?php
session_start();
//$s = "TEST";
header("Cache-control: private");
?>

<html>
<head>
<meta http-equiv="Content-T
ype" content="text/html; charset=big5">
<title>ALL STAR-MODE</title>
<style type="text/css">
 .a{
    border: none;
    display: inline-block;
    outline: 0;
    padding: 10px 30px;
    vertical-align: middle;
    overflow: hidden;
    text-decoration: none;
    color: white;
    background-color: black;
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
	font-size:15px;
	}
	#main {
		background: url(images/BA2.jpg);
		background-repeat: no-repeat;
		background-size:cover;
	}
	.jumbotron {
    background-color:black !important; 
	padding: 70px !important;;
	margin-bottom: 1600px;
	
	}
	.jumbotron h2 {
	font-family:Microsoft JhengHei !important;
	color: white!important;
	font-size: 35px !important;

	font-family: 'Shift', sans-serif;
	font-weight: bold;

	}

	.col-lg-4{
	background-color:white;
	font-family:Microsoft JhengHei;
	}
	
  </style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body id="main" ondragstart="return false" oncontextmenu="return false" onselectstart="return false">
<div class="jumbotron text-center">
  <h2>全明星-測驗中...</h2>
  <p></p>
</div>

<div class="container">
  
  <div class="row">
    <div class="col-sm-4">
	</div>
    <div class="col-lg-4">
	<form id="form_word"  method="post" onsubmit="return check();"  action="judge_split_test 1.php">
    <p id="voc"><?php echo $_SESSION["voc"];?></p>
		<input type=text id="answer" name="answer">
		
	<br>	
    <br>
	<audio controls autoplay>
	<source src="/MEDIA/<?php echo $_SESSION["voc"];?>.mp3" type="audio/mpeg" autostart="true">
	</audio>
    <br>
    <br>
		
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp題目  <?php echo $_SESSION["quest"];?>/200
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input class="a" type="submit"  value="送出">
	</form> 
	
	<label id="second_1">剩餘時間：</label><label id="lab_second"></label><label id="second_2">秒</label>
	</div>
    <div class="col-sm-4"></div>


  </div>
</div>

<script language="JavaScript" type="text/JavaScript">
     
	var timer = 30;

	function check(){
	var answer = document.getElementById('answer').value;
				if (answer==''){
					alert('未填入答案');
					return false;
				}
	}
	
	function show_time(){
		timer--;
		obj = document.getElementById('lab_second');
		obj.innerHTML = timer;
		
		if(timer<=0){
			alert("時間到");
			location.replace("result.php");
			return false;
		}
		
		else{
			TimerID = setTimeout("show_time()",1000);
		}
		
		
	}

    show_time();
	$("#form_word").find(":text,textarea").each(function() {
                $(this).val("");
            });
	//window.history.forward(1);
</script>
<!--

<script language="JavaScript" type="text/JavaScript">



function ajaxGetassessment(){
        
		var answer = document.getElementById('answer').value;
		var ID = document.getElementById('page').value;
			if (answer==''){
				//alert('未填入答案');
				alert(ID);
				return false;
			}
		
	$.ajax({url : "judge_split_test.php",
	    type : "POST",
		data : { answer : answer, ID : ID},
		success: function(response) {
		alert(answer);
		$("#voc").html(response);
		$("#page").html(response);
		}
			});
		
}

</script>

<script language="JavaScript" type="text/JavaScript">
var timer = 1205;
var actioned = false;
	function textkeydown(){
		if (event.keyCode==13) {
			if (document.getElementById('u_ans').value!='')
				ajaxGetassessment('next','');
			event.returnValue=false;
		}
	}
	function ans_event(val){
		document.getElementById('u_ans').value=val;
		document.getElementById('trid').style.background='#FFF68F';
		document.getElementById('radio_ans1').disabled = true;
		document.getElementById('radio_ans2').disabled = true;
		document.getElementById('radio_ans3').disabled = true;
		document.getElementById('radio_ans4').disabled = true;
	}
	function ajaxGetassessment(action,tag)
	{
		
		var wid = document.getElementById('wid').value;
		var kind = document.getElementById('kind').value;
		var u_ans = document.getElementById('u_ans').value;
		var grade = document.getElementById('grade').value;
		if (wid!='0')
			if ((u_ans=='')&&(tag!='end')){
				alert('請先作答');
				return false;
			}	
		if (actioned==false){
		actioned = true;	
		$.ajax({
			url : "ajaxGetassessment2.asp",
			type : "POST",
			data : { wid : wid ,kind : kind , action : action , tag : tag , u_ans : u_ans , grade : grade  },
			dataType : "html", 
			success : function(ajax_res){
				$("#ajax_word_table").html(ajax_res);
				actioned = false;
			}
			});
		}	
	}
	
	function show_time(){
        timer--;
	t_m = timer/60;
	t_s = timer%60;
	obj = document.getElementById('lab_second');

	obj.innerHTML = timer;
	if(timer <= 0){
		clearTimeout(TimerID);
		alert('測試時間已結束');
		ajaxGetassessment('next','end');
	}
	else{	
	
		TimerID = setTimeout("show_time()",1000);
	}

}

	ajaxGetassessment('next','start');
	show_time();

</script>
-->
</body></html>