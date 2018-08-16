<?php
	session_start();
	
	
	$topic=$_SESSION["gene_topic"];
	$str1=$_POST["answer"];  //####
	
	//$str2=$_POST["word_split2"];
    //$str3=$_POST["word_split3"];
    //$str4=$_POST["word_split4"];
    //$str5=$_POST["word_split5"];
    
    
	
	
    //題目
    //$topic2=$A[$rand_num[1]];
    //$topic3=$A[$rand_num[2]];
    //$topic4=$A[$rand_num[3]];
    //$topic5=$A[$rand_num[4]];

    judge($str1, $topic);
    //judge($str2, $topic2);
    //judge($str3, $topic3);
    //judge($str4, $topic4);
    //judge($str5, $topic5);


function judge($str,$key){
		$quest=($_SESSION["quest_gene"]-1);
		$_SESSION["u_answer"][$quest]=$str;  //####
		
		$str_temp=$str;
        $topic=$key[0];
        $topic_temp=$topic;
        $ans = splittopic($key);//題目的分割
        $ans_array_length = count($ans);
        $ans_str = "";
		
        for($i=0;$i<$ans_array_length;$i++){
            $ans_str.=$ans[$i];
        }//合起來變字串 變成wh/e/r/e
        echo "正確答案:".$topic_temp."<br>";
        echo "您的答案:".$str_temp."<br>";
		
        if(strlen($str)-strlen($topic) > 2 || strlen($str)-strlen($topic) < -2){
		   $error = $key[1];
		   //$str_code = explode("-",$error);
		   //for($i=0;$i<=count($str_code);$i++){
			   //$_SESSION["all_error"][]=$str_code[$i];
			   $_SESSION["all_error"][]=$key[1];
		   //}
		   
		   
		   if($_SESSION["quest_gene"]>($_SESSION["gene_size"]-1)){
				$_SESSION["analysis"][] = 0;
				
				header("Location: temp.php");   
				exit;
			}
			else{
			$rand_num=$_SESSION["gene_test"];
			$quest=$_SESSION["quest_gene"];
			$gene_topic=$rand_num[$quest];
			$gene_voc=$rand_num[$quest][0];
			$quest++;
			$_SESSION["gene_voc"]=$gene_voc;
			$_SESSION["quest_gene"]=$quest;
			$_SESSION["gene_topic"]=$gene_topic;
			$_SESSION["analysis"][] = 0;
			
			
			header("Location: gene_test.php");
			exit;
			}
        }
		
		
        $ans_sec = explode("/",$ans_str);
        if(strlen($str)==strlen($topic)){
        //字數相同判斷 
            $err_temp="";
            $str_spli=str_split($str);
            $sec_temp=0;//計算判斷到第幾個字元
            if(strlen($str)==strlen($topic)){//字數相同
                for($i=0;$i<count($ans_sec);$i++){
                    $temp_sec="";
                    for($j=0;$j<strlen($ans_sec[$i]);$j++){
                        $temp_sec.=$str_spli[$sec_temp];
                        $sec_temp++;
                    }
                    if($temp_sec!=$ans_sec[$i]){
                        $err_temp.=$i;
                    }
                }
            }
			if($err_temp==""){
			$_SESSION["all_error"][]="0";
			if($_SESSION["quest_gene"]>($_SESSION["gene_size"]-1)){
				$_SESSION["analysis"][] = 1;	
				header("Location: temp.php.php");   
				exit;
			}
			else{
			$rand_num=$_SESSION["gene_test"];
			$quest=$_SESSION["quest_gene"];
			$gene_topic=$rand_num[$quest];
			$gene_voc=$rand_num[$quest][0];
			$quest++;
			$_SESSION["gene_voc"]=$gene_voc;
			$_SESSION["quest_gene"]=$quest;
			$_SESSION["gene_topic"]=$gene_topic;
			$_SESSION["analysis"][] = 1;
			
			header("Location: gene_test.php");
			exit;
			}
		}	
        echo "<br>字數相同錯誤 &nbsp : &nbsp ".$err_temp."<br>";
        $err_temp_arr=str_split($err_temp);
        geterrorcode($err_temp_arr,$key);
		
		if($_SESSION["quest_gene"]>($_SESSION["gene_size"]-1)){
				$_SESSION["analysis"][] = 0;
				header("Location: temp.php");   
				exit;
			}
			else{
			$rand_num=$_SESSION["gene_test"];
			$quest=$_SESSION["quest_gene"];
			$gene_topic=$rand_num[$quest];
			$gene_voc=$rand_num[$quest][0];
			$quest++;
			$_SESSION["gene_voc"]=$gene_voc;
			$_SESSION["quest_gene"]=$quest;
			$_SESSION["gene_topic"]=$gene_topic;
			$_SESSION["analysis"][] = 0;
			
			header("Location: gene_test.php");
			exit;
			}
		
		
        echo "<br>---------------------------------------------------------------<br>";    
        //字數相同判斷
		return  $err_temp;
		
        }

        else{

            for($i=0;$i<count($ans_sec);$i++){ 
                $str=str_replace($ans_sec[$i],$i,$str);//將答案替換成數字
                $topic=str_replace($ans_sec[$i],$i,$topic);//將題目替換成數字
            }
             
            $record_error=judgeanswer($str,$topic);
            geterrorcode($record_error,$key);
			
			if($_SESSION["quest_gene"]>($_SESSION["gene_size"]-1)){
				$_SESSION["analysis"][] = 0;	
				header("Location: temp.php");
				exit;
			}
			else{
			$rand_num=$_SESSION["gene_test"];
			$quest=$_SESSION["quest_gene"];
			$gene_topic=$rand_num[$quest];
			$gene_voc=$rand_num[$quest][0];
			$quest++;
			$_SESSION["gene_voc"]=$gene_voc;
			$_SESSION["quest_gene"]=$quest;
			$_SESSION["gene_topic"]=$gene_topic;
			$_SESSION["analysis"][] = 0;
			
			header("Location: gene_test.php");
			exit;
			}
			
            echo"<br><br>";
        }
    }
    
    function judgeanswer($topic_str,$ans_str){//(替換完的回答字串,替換完的題目字串)
        $topic_rc=0;
        $ans_rc=0;
        $topic_sec=str_split($topic_str);
        $ans_sec=str_split($ans_str);
        $record_error=array(-1);
        $record_error_num=0;
        $topic_num_temp=0;//紀錄目前回答字串判斷到的長度
        $ans_num_temp=0;//紀錄目前題目判斷到的長度
        $vowel=array("a","e","i","o","u");

        
         while($topic_num_temp<count($topic_sec)){
                if(is_numeric($topic_sec[$topic_num_temp])){
                    if($topic_sec[$topic_num_temp]==$ans_sec[$ans_num_temp]){
                        $topic_num_temp++;
                        $ans_num_temp++;
                    }
                    else{
                        
                        if($ans_num_temp > count($ans_sec)-1){
                            $ans_num_temp = count($ans_sec)-1;
                        }                         
                        if(!in_array($ans_num_temp,$record_error)){
                            $record_error[$record_error_num]=$ans_num_temp;
                            $record_error_num++;
                        }   
                        $topic_num_temp++;
                        $ans_num_temp++;
                    }
                }

                else{
                    if(!in_array($topic_sec[$topic_num_temp],$vowel)){
      
                        if($ans_num_temp > count($ans_sec)-1){
                            $ans_num_temp = count($ans_sec)-1;
                        } 
                        if(!in_array($ans_num_temp,$record_error)){
                            $record_error[$record_error_num]=$ans_num_temp;
                            $record_error_num++;
                        }
                        
                        if($topic_num_temp<(count($topic_sec)-1)){
                           if(is_numeric($topic_sec[$topic_num_temp+1] && $topic_sec[$topic_num_temp+1]!=$ans_sec[$ans_num_temp])){
                                $ans_num_temp++;
                           }     
                        }//如果英文的下一個是數字
                        $topic_num_temp++;
                        if($ans_num_temp<(count($ans_sec)-1) && $topic_sec[$topic_num_temp]==$ans_sec[$ans_num_temp+1]){
                             $ans_num_temp++;
                        }
                    }//是母音的情況
             
                    else{

                        if($ans_num_temp > count($ans_sec)-1){
                            $ans_num_temp = count($ans_sec)-1;
                        }

                        //判斷是否是中間錯誤
                        if($topic_num_temp<count($topic_sec)-1 && $topic_sec[$topic_num_temp+1]==$ans_sec[$ans_num_temp]){ 
                            if(!in_array($ans_num_temp-1,$record_error)){
                                $record_error[$record_error_num]=$ans_num_temp-1;
                                $record_error_num++;
                            }
                        }

                        else{
                            if(!in_array($ans_num_temp,$record_error)){
                                $record_error[$record_error_num]=$ans_num_temp;
                                $record_error_num++;
                            }
                        }//判斷是否是中間錯誤

                        if($topic_num_temp<(count($topic_sec)-1)){
                           if(is_numeric($topic_sec[$topic_num_temp+1] && $topic_sec[$topic_num_temp+1]!=$ans_sec[$ans_num_temp])){
                                $ans_num_temp++;
                           }     
                        }//如果英文的下一個是數字
                        $topic_num_temp++;
                        if($ans_num_temp<(count($ans_sec)-1) && $topic_sec[$topic_num_temp]==$ans_sec[$ans_num_temp+1]){
                             $ans_num_temp++;
                        } 
                    }//子音的情況
                } 
        }
        echo "<br>不同字數的錯誤 : ";  
        for($i=0;$i<count($record_error);$i++){
            echo $record_error[$i];
        }
        echo "<br>---------------------------------------------------------------";
        return  $record_error;         
    }
	
          function splittopic($key){//A[?][0]是字,A[?][2]是分割號,輸入是$A[?]
           $temp_num=$key[2];
           $num_sec = explode("/",$temp_num);
           $topic = $key[0];
           $topic_sec=str_split($topic);
           $sec_record=0;
           $word_record=0;//紀錄單字輸出到第幾個元素
           $pre_symbol=0;
           $topic_exec;

          for($i=0;$i<strlen($topic);$i++){
               if (in_array($i,$num_sec)){
                    if($sec_record==0){
                              for($j=0;$j<$i+1;$j++){
                                   $topic_exec[$j]=$topic_sec[$word_record];
                                   $word_record++;
                              }
                              $pre_symbol=$i;
                              array_push($topic_exec,"/");
                              $sec_record++;
                    }
     
                    else{
                         for($j=0;$j<$i-$pre_symbol;$j++){
                              array_push($topic_exec,$topic_sec[$word_record]);
                              $word_record++;
                         }
                         $pre_symbol=$i;
                         array_push($topic_exec,"/");
                    }

              }
            }

            for($j=$word_record;$j<strlen($topic);$j++){
               array_push($topic_exec,$topic_sec[$j]);
            }
         return $topic_exec;
    }

    function geterrorcode($record_error,$key){
        $value=0;
        $error_code=$key[1];
        $error_code_split=explode("-",$error_code);
        for($i=0;$i<count($error_code_split);$i++){
             for($j=0;$j<count($record_error);$j++){
                if($record_error[$j]==$i){
                    //echo "<br>錯誤代碼 :  ".$error_code_split[$i];
                    if($value==1){
					   $temp.="-".$error_code_split[$i];
                    }
                    else{
                       $temp.= $error_code_split[$i];
                    }
                    $value=1;
					//$_SESSION["all_error"][]=$temp;
                }
             }
        }
		$_SESSION["all_error"][]=$temp;
    }    


?>