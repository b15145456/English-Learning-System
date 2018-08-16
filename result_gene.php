<?php
	session_start();
	error_reporting(0);
	//print_r($_SESSION["u_answer"]);
	$gene_test=$_SESSION["gene_test"];//題號
	$all_error=$_SESSION["all_error"];
	$analysis=$_SESSION["analysis"];
	echo "<br><br>";
	$userQ_count=0;
	$userRQ_count=0;

	$i = 0;
    $myfile = fopen("voc.txt", "r") or die("Unable to open file!");
	// 输出单行直到 end-of-file
	while(!feof($myfile)) {

	   	 $str=fgets($myfile);//fgets()會逐行讀取
	   	 $strarr=explode("	",$str);
         for($j = 0; $j < count($strarr); $j++) {
		     $cAllArr[$i][$j] = $strarr[$j];
	     }
		 $i++;	   	
	}
	fclose($myfile);

	for($i=0;$i<count($all_error);$i++){
	  	$temp_topicnum=$gene_test[$i][4]-1;//題號
	  	$userQ[$userQ_count]=$cAllArr[$temp_topicnum];
      	$userQ_count++;

	  	if($all_error[$i]=="0"){
	  		$userRQ[$userRQ_count]=$cAllArr[$temp_topicnum];
	  		$userRQ_count++;
	  	}
        else{
	  		$error_temp_arr=explode("-",$all_error[$i]);
	  		for($k=0;$k<count($error_temp_arr);$k++){
	   				$temp_err=($error_temp_arr[$k]);
	   				$cAllArr[$temp_topicnum][$temp_err]=0;
	  		}

	  		$userRQ[$userRQ_count]=$cAllArr[$temp_topicnum];
      		$userRQ_count++;
      	}	
	}
    $_SESSION["userQ"]=$userQ;
    $_SESSION["userRQ"]=$userRQ;      
    header("Location: gene.php");
?>