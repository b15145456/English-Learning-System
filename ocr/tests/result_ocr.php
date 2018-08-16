<?php
session_start();
//print_r($_SESSION["u_answer"]);
//print_r($_SESSION["all_error"]);
//print_r($_SESSION["all_voc_classic"]);
error_reporting(0);

	$error_code_t = array_unique($_SESSION["all_error"]);
	$error_code	= array_values($error_code_t);

	for($i=0;$i<=count($error_code);$i++){
	$code_temp = $error_code[$i];
	switch($code_temp){
		case "A11":
			$message[$i]= "短母音字母拼法有誤";
			break;
		case "A12":
			$message[$i]= "注意長母音字尾使用";
			break;
		case "A20":
			$message[$i]= "長母音字母拼法有誤";
			break;
		case "a30":
			$message[$i]= "加強配對母音字母的辨識";
			break;
		case "A41":
			$message[$i]= "加強對字母Y的使用辦法";
			break;	
		case "a42":
			$message[$i]= "注意配對母音字母放置字尾的辨識辦法";
			break;	
		case ($code_temp == "A51" || $code_temp == "a51"):
			$message[$i]= "注意母音多音群組的使用";
			break;	
		case ($code_temp == "A52" || $code_temp == "a52"):
			$message[$i]= "注意母音字母改變為長母音發音的現象";
			break;		
		case "A53":
			$message[$i]= "辨識母音字母改變為短母音發音緣由";
			break;	
		case ($code_temp == "A54" || $code_temp == "a54"):
			$message[$i]= "辨識原母音字母發音方式";
			break;	
		case ($code_temp == "A55" || $code_temp == "a55"):
			$message[$i]= "辨識母音與子音併音現象";
			break;	
		case ($code_temp == "A56" || $code_temp == "a56"):
			$message[$i]= "辨識母音衍生音產生與唸法";
			break;	
		case "A60":
			$message[$i]= "注意母音字母省略發音原因";
			break;
		case ($code_temp == "X" || $code_temp == "Y" || $code_temp == "Z"):
			$message[$i]= "注意字尾e功能";
			break;
		case ($code_temp == "B11" || $code_temp == "D11"):
			$message[$i]= "規則子音寫法有誤";
			break;	
		case ($code_temp == "B12" || $code_temp == "D12"):
			$message[$i]= "字母C,K兩者辨識有誤";
			break;	
		case ($code_temp == "B21" || $code_temp == "D21"):
			$message[$i]= "注意c,g與e,i,y關係";
			break;
		case "b22":
			$message[$i]= "注意多音c,g發音上寫法的關係";
			break;	
		case "D22":
			$message[$i]= "注意字尾e對子音字母功能";
			break;		
		case ($code_temp == "B30" || $code_temp == "D30" || $code_temp == "b30" || $code_temp == "d30"):
			$message[$i]= "加強對配對子音字母的認知";
			break;
		case ($code_temp == "B41" || $code_temp == "D41"):
			$message[$i]= "注意U,W的互通性";
			break;
		case ($code_temp == "D42" || $code_temp == "D43" || $code_temp == "D44" || $code_temp == "d43"):
			$message[$i]= "注意重複子音字母的使用";
			break;	
		case ($code_temp == "b51" || $code_temp == "d51"):
			$message[$i]= "加強對不規則發音用法了解";
			break;	
		case ($code_temp == "B52" || $code_temp == "b52"):
			$message[$i]= "了解二,三重子音用法與發音";
			break;	
		case ($code_temp == "B53" || $code_temp == "b53"):
			$message[$i]= "注意子音互補組合與發音";
			break;	
		case ($code_temp == "B60" || $code_temp == "b60"):
			$message[$i]= "注意省略子音的原因";
			break;	
		case ($code_temp == "E1" || $code_temp == "F1"):
			$message[$i]= "注意重音內長母音拼音時字母組合方式";
			break;	
		case ($code_temp == "E2" || $code_temp == "F2"):
			$message[$i]= "注意重音內短母音拼音時字母組合方式";
			break;	
		case ($code_temp == "E3" || $code_temp == "F3"):
			$message[$i]= "注意重音內配對母音的拼音";
			break;	
		case "E4":
			$message[$i]= "注意重音內字母R與母音併音與寫法";
			break;
		case "F5":
			$message[$i]= "注意次重音內字母R與母音併音與寫法";
			break;	
		case "G6":
			$message[$i]= "注意輕音內長母音拼音時字母組合方式";
			break;	
		case "G7":
			$message[$i]= "注意輕音內短音拼音時字母組合方式";
			break;	
		case "G8":
			$message[$i]= "注意輕音內配對字母發音與字母組合方式";
			break;	
		case "G9":
			$message[$i]= "注意輕音內字母R與母音併音與寫法";
			break;	
		case "G10":
			$message[$i]= "注意輕音內母音與子音併音產生與寫法";
			break;	
			}
	}
	$all_message = array_unique($message);
	$message = array_values($all_message);
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
	<body id="main" background="../images/ba3.jpg">
	
	<div class="jumbotron text-center">
	  <h2>OCR-結果頁面</h2>
	  <p></p>
	</div>
	
	<div class="container">
	  <div class="row" width="300" border="1">
		<div class="col-sm-4">
		</div>
		<div class="col-lg-4">
		  <table>
			<tr>
			<td>題號</td><td>你的答案</td><td>正確答案</td>
			</tr>
			<?php for($i=0;$i<count($_SESSION["u_answer"]);$i++){ ?>
			<tr>
			<td><?php echo $i+1; ?></td><td><?php echo $_SESSION["u_answer"][$i]; ?></td><td> <?php echo $_SESSION["all_voc_ocr"][$i];?> </td>
			</tr>
			<?php } ?>
			</table>
			<br><br><br>
		</div>
		<div class="col-sm-4">
		</div>
		</div>


		<div class="row" width="300" border="1">
		<div class="col-sm-4">
		</div>
		<div class="col-lg-4">
		  <table>
			<tr>
			<td>錯誤代碼</td>
			</tr>
			<?php for($i=0;$i<count($message);$i++){ ?>
			<tr>
			<td><?php echo $message[$i]; ?></td>
			</tr>
			<?php } ?>
			</table>
			<br><br><br>
		</div>
		<div class="col-sm-4">
		</div>
		</div>
		
		  <div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-lg-4">
			<button class="a" type="button" onclick="location.href='http://localhost/main.php'">回首頁</button>
			 <button class="a" type="button" onclick="location.href='upload.php'">重新測驗</button>
			 <br><br>
			</div>
			<div class="col-sm-4">
			</div>
			</div>


	</div>

	</body>
	</html>








