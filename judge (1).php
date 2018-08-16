<!DOCTYPE html>
<html>
    <body>
    <?php
      include("syllable-re2.php");
      function topic_rand(){
        error_reporting(0);//防止提醒顯示
        $Ph_NB=array();
        $rand_num=0;
        $choose_num="";
        for($i=0;$i<=8;$i++){
          $Ph_NB[$i]=$i;
        }//設定初值
  
        for($i=0;$i<=4;$i++){
          $rand_num=rand(0,8-$i);
          $choose_num[$i]=$Ph_NB[$rand_num];
          unset($Ph_NB[$rand_num]);
          $Ph_NB= array_values($Ph_NB);
          //2017.10.10上面這兩行出問題 Ph_Nb沒宣告成陣列處理問題
        }
      return $choose_num; 
    } 
    	$rand_num=topic_rand();
   ?>
   <div id=word_topic>where</div>
   <br><br>
    <form id="form_word"  method="post" action="judge_split_test.php">
    <p><?php echo $A[$rand_num[0]][0]; ?></p>
		<input type="text" name="word_split1">
    <p><?php echo $A[$rand_num[1]][0]; ?></p>
		<input type="text" name="word_split2">
    <p><?php echo $A[$rand_num[2]][0]; ?></p>
		<input type="text" name="word_split3">
    <p><?php echo $A[$rand_num[3]][0]; ?></p>
		<input type="text" name="word_split4">
    <p><?php echo $A[$rand_num[4]][0]; ?></p>
		<input type="text" name="word_split5">
    <br>
    <br>
    <br>
		<input type="submit" value="送出">
	</form>
  </body>	
</html>

