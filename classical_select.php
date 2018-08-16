<?php
session_start();

?>

<html lang="en">
<head>
  <title>Main</title>
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
<body id="example1">

<div class="jumbotron">
  <p></p>
  <h1>經典模式-選擇頁面</h1>
  
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-lg-4">
      <h1>測驗說明:</h1>
	  <br>
      <h4>此為classic mode的測驗前導頁，</h4>
      <h4>請於下方選項，選出欲測驗的等級與題數。</h4>
	  <h4>答題失敗仍會繼續作答直到所有題目完畢。</h4>
	  <h4>最後產生結果頁面，所有答題結果</h4>
	  <h4>與錯誤建議，請詳細閱讀。</h4>
		 <br><br><br> 
    </div>
    <div class="col-sm-4">+
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-lg-4">
	<form method="post" action="singlelevel_test.php">
			<p1>number</p1>
				<select name="number_select">
　				<option value="5">5</option>
　				<option value="6">6</option>
　				<option value="7">7</option>
　				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
			&nbsp&nbsp&nbsp
		    <p1>level</p1>
				<select name="level_select">
				<option value="1">1</option>
　				<option value="2">2</option>
　				<option value="3">3</option>
　				<option value="4">4</option>
				<option value="5">5</option>
　				<option value="6">6</option>
　				<option value="6">6</option>
　				<option value="7">7</option>
　				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
		<br><br><br> 
			</select>
		<br><br><br>
    </div>
	 </div>

	<div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-lg-4">
	<button class="a" type="button" onclick="location.href='main.php'">回上一頁</button>
	<input class="a"   type="submit" value="開始測驗">
	<br><br><br>
	
			</div>
      <div class="col-sm-4">  
			
		</div>
	</form>
    
  </div>
</div>

</body>
</html>