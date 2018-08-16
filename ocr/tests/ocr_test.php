<?php
session_start();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>ocr</title>
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
<script src="js/jquery.js" type="text/javascript" charset="big5"></script>

</head>
<body background="../images/BA2.jpg" id="main" ondragstart="return false" oncontextmenu="return false" onselectstart="return false">

<div class="jumbotron text-center">
  <h2>OCR-測驗中...</h2>
  <p></p>
</div>

<div class="container">
  
  <div class="row">
    <div class="col-sm-4">
	</div>
    <div class="col-lg-4">
	<form id="form_word"  method="post" onsubmit="return check();"  action="judge_split_test_ocr_tt.php">
    <p id="voc"><?php echo $_SESSION["ocr_voc"];?></p>
		<input type=text id="answer" name="answer">
		
	<br>	
    <br>
	<audio controls autoplay>
	<source src="/MEDIA/<?php echo $_SESSION["ocr_voc"];?>.mp3" type="audio/mpeg" autostart="true">
	</audio>
    <br>
    <br>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp題目  <?php echo $_SESSION["quest_ocr"];?>/<?php echo $_SESSION["ocr_num"]; ?>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input class="a" type="submit"  value="送出">
		
	</form> 
	<label id="second_1">剩餘時間：</label><label id="lab_second"></label><label id="second_2">秒</label>
	</div>
    <div class="col-sm-4">
	</div>
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

</script>