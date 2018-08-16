<?php
session_start();
//print_r($_SESSION["u_answer"]);
error_reporting(0);
session_destroy();
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
		#main {
			background-repeat: no-repeat;
			background-size:cover;
			background: url(images/ba3.png);
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
		table, th, td {
		border: 1px solid black;
		font-size: 20px;
		}
		</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body id="main">
	<div class="jumbotron text-center">
	  <h2>全明星-結果頁面</h2>
	  <p></p>
	</div>
		<div class="container">
	  <div class="row" width="300" border="1">
		<div class="col-sm-4">
		</div>
		<div class="col-lg-4">
		  <br><br>
		  <table>
			<tr>
			<td>題號</td><td>你的答案</td><td>正確答案</td><td>單字等級</td>
			</tr>
			<tr>
			<td><?php echo $_SESSION["quest"]; ?></td><td><?php echo $_SESSION["u_answer"][($_SESSION['quest']-1)]; ?></td><td> <?php echo $_SESSION["voc"];?> </td>
			 <td><?php echo $_SESSION["level"];?></td>
			</tr>
			</table>
			<h1><?php if($_SESSION["success"]!=""){ echo $_SESSION["success"];}?></h1>
			
			<br><br>
		</div>
		
		<div class="col-sm-4">
	  </div>
	  </div>
	 
	  <div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-lg-4">
			<button class="a" type="button" onclick="location.href='main.php'">回首頁</button>
			 <button class="a"  type="button" onclick="location.href='explain.php'">重新測驗</button>
			<br>
			<br>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</div>

	</body>
	</html>