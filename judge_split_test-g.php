<?php
    include("syllable-re2-g.php");
    session_start();


    $rand_num=$_SESSION["topic_arr"];

    $str1=$_POST["word_split1"];
    $str2=$_POST["word_split2"];
    $str3=$_POST["word_split3"];
    $str4=$_POST["word_split4"];
    $str5=$_POST["word_split5"];
    


    $topic1=$A[$rand_num[0]];//題目
    $topic2=$A[$rand_num[1]];
    $topic3=$A[$rand_num[2]];
    $topic4=$A[$rand_num[3]];
    $topic5=$A[$rand_num[4]];

    judge($str1, $topic1);
    judge($str2, $topic2);
    judge($str3, $topic3);
    judge($str4, $topic4);
    judge($str5, $topic5);


    function judge($str,$key){
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
        echo "<br>字數相同錯誤 &nbsp : &nbsp ".$err_temp."<br>";
        echo "<br>---------------------------------------------------------------<br>";    
        //字數相同判斷
		
        }
   
        else{

            for($i=0;$i<count($ans_sec);$i++){ 
                $str=str_replace($ans_sec[$i],$i,$str);//將答案替換成數字
                $topic=str_replace($ans_sec[$i],$i,$topic);//將題目替換成數字
            }
    
            judgeanswer($str,$topic);
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
    }



?>