<?php 
	session_start();
	include("voc.php");
	$uploadArr = $_SESSION["uploadArr"];
	$resultArr = array();
	$loadarr = array();
	$str=array();
	for ($i=0; $i < count($uploadArr); $i++) { 
	$str = explode(" ",$uploadArr[$i]);
	$str1 = preg_split("/[\s,]+/",$uploadArr[$i]);
	$str2 = mb_split("\s",$uploadArr[$i]);
	    for($x=0; $x < count($str2); $x++){
			array_push($loadarr,$str2[$x]);
		}
	}
	
	for ($i=0; $i < count($loadarr); $i++) { 
		for ($j=0; $j < count($A) ; $j++) { 
		if($loadarr[$i]==$A[$j][0]){
			array_push($resultArr,$A[$j]);
			}
		}
	}
	$resultArr = array_map("unserialize", array_unique(array_map("serialize", $resultArr)));
	
	//echo $str[0];
	//echo $str[1];


	
	/*error_reporting(0);//防止提醒顯示
	for ($i=0; $i <= count($uploadArr)-1; $i++) { 
		for ($j=0; $j <= count($A)-1 ; $j++) {  
			if(strpos($uploadArr[$i],$A[$j][0])!== false){
				array_push($resultArr,$A[$j]);
			}
		}
		
	} */
	
	$_SESSION["resultArr"] = $resultArr;
	$ocr_topic=$resultArr[0];
	$ocr_voc=$resultArr[0][0];
	$_SESSION["ocr_voc"]=$ocr_voc;
	$_SESSION["all_voc_ocr"][0]=$ocr_voc;
	$_SESSION["ocr_topic"]=$ocr_topic;
	$_SESSION['quest_ocr']=1;
	$_SESSION["u_answer"]=array();
	$_SESSION["ocr_num"]=count($resultArr);
	header("Location: ocr_test.php");  