<?php

include("voc.php");
session_start();
	$gene_temp = array();
	array_push($gene_temp,$A[26],$A[2],$A[31],$A[35],$A[93]);
		
		function rand_gene($gene_temp){
		for($i=0;$i<=1;$i++){
				$size=count($gene_temp)-1;
				$rand_num=rand(0,$size-$i);
				$gene_choose[$i]=$gene_temp[$rand_num];
				unset($gene_temp[$rand_num]);
				$gene_temp= array_values($gene_temp);
			}
			return $gene_choose;
		}
	$gene_choose_1 = rand_gene($gene_temp);
	
	$gene_temp = array();
	array_push($gene_temp,$A[25],$A[13],$A[90],$A[115],$A[100]);
	$gene_choose_2 = rand_gene($gene_temp);	
		
	$gene_temp = array();
	array_push($gene_temp,$A[20],$A[30],$A[17],$A[3],$A[72]);
	$gene_choose_3 = rand_gene($gene_temp);		
		
	$gene_temp = array();
	array_push($gene_temp,$A[29],$A[50],$A[47],$A[79],$A[85]);
	$gene_choose_4 = rand_gene($gene_temp);		

    $gene_temp = array();
	array_push($gene_temp,$A[56],$A[98],$A[36],$A[5],$A[45]);
	$gene_choose_5 = rand_gene($gene_temp);	

	$gene_temp = array();
	array_push($gene_temp,$A[40],$A[63],$A[73],$A[169],$A[190]);
	$gene_choose_6 = rand_gene($gene_temp);	
	
	$gene_temp = array();
	array_push($gene_temp,$A[76],$A[57],$A[43],$A[122],$A[144]);
	$gene_choose_7 = rand_gene($gene_temp);	
	
	$gene_temp = array();
	array_push($gene_temp,$A[74],$A[49],$A[78],$A[149],$A[156]);
	$gene_choose_8 = rand_gene($gene_temp);

    $gene_temp = array();
	array_push($gene_temp,$A[37],$A[142],$A[111],$A[109],$A[195]);
	$gene_choose_9 = rand_gene($gene_temp);	
	
	$gene_temp = array();
	array_push($gene_temp,$A[87],$A[27],$A[70],$A[82],$A[181]);
	$gene_choose_10 = rand_gene($gene_temp);

	$gene_test=array_merge($gene_choose_1,$gene_choose_2,$gene_choose_3,$gene_choose_4,$gene_choose_5,$gene_choose_6,$gene_choose_7,$gene_choose_8,$gene_choose_9,$gene_choose_10);	
	
	
	$_SESSION["gene_test"]=$gene_test;
	$gene_topic = $gene_test[0];
	$gene_voc = $gene_test[0][0];
	$_SESSION["gene_voc"] = $gene_voc;
	$_SESSION["gene_topic"] = $gene_topic;
	$_SESSION["gene_size"] = count($gene_test);
	$_SESSION["quest_gene"]=1;
	
	
?>

<!DOCTYPE html>
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
  <h1>基因模式-說明頁面</h1>
  <p></p>
</div>	
	<div class="container">
	  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-lg-4">
      <h1>測驗說明:</h1>
      <br>	
      <h4>此為gene-mode的前導頁面。</h4>
      <h4>此模式會產生20題的前側，，</h4>
	  <h4>針對使用者多音節的10個觀念進行測試，</h4>
	  <h4>測試完畢會產生觀念比例柱狀圖。</h4>
	  <h4>按下"產生測驗"的按鈕就會產生與您</h4>
	  <h4>觀念比例相符合之題目進行再次測驗，</h4>
	  <h4>如此循環下去。</h4>
		<br><br><br><br>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
 
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-lg-4">
	</div>
    <div class="col-sm-4">
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-lg-4">
	<button class="a" type="button" onclick="location.href='main.php'">回上一頁</button>
    <button class="a" type="button" onclick="location.href='gene_test.php'">開始測驗</button>
	 </form><br><br><br>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
  </div>
</body>
</html>

