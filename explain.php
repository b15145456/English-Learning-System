<?php
     error_reporting(0);
	session_start();
    include("syllable-re2.php");
	$rand_num=randlevel();
	$_SESSION["topic_arr"]=$rand_num;
	$topic1=$rand_num[0];
	$voc=$rand_num[0][0];
	$_SESSION["voc"]=$voc;
	$_SESSION["topic"]=$topic1;
	$_SESSION['quest']=1;
	$_SESSION["u_answer"]=array();
?>
<html lang="en">
<head>
  <title>Main</title>
	<style>
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
	#example1 {
		background: url(images/ba1.jpg);
		background-repeat: no-repeat;
		background-size:cover;
	}
	.jumbotron {
    background-color:black !important; 
	padding: 70px !important;;
	margin-bottom: 1600px;
	
	}
	.jumbotron h1 {
	font-family:Microsoft JhengHei !important;
	color: white!important;
	font-size: 48px !important;

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
<body  id="example1">

<div class="jumbotron">
  <h1>全明星模式-說明頁面</h1>
  <p></p>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-lg-4">
      <h1>測驗說明:</h1>
	  <br>
      <h4>此為ALL-Star mode的測驗前導頁，</h4>
      <h4>此模式會產生共兩百題隨機測驗題，</h4>
	  <h4>共10個等級,每個等級20題，</h4>
	  <h4>難度會隨著作答數提升。</h4>
	  <h4>若答題失敗則立即結束測驗，並告知錯誤。</h4>
		<br><br><br>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-lg-4">
	<button class="a" type="button" onclick="location.href='main.php'">回上一頁</button>
     <button class="a" type="button" onclick="location.href='all star.php'">開始測驗</button>
	<br><br><br>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>

</body>
</html>