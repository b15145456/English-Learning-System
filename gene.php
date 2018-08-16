<?php
        session_start();
        error_reporting(0);

        $analysis=$_SESSION["analysis"];//前測答題要傳入的值1是對0是不對
        $userQ=$_SESSION["userQ"];
        $userRQ=$_SESSION["userRQ"];

		$SIZE = 259; // 題庫總題目數
		$CHROMOSOME_NUM = 259; // 產生染色體數 (題目組合)
		$GENERATION_NUM = 20; // 經過多少代
		$CONCEPT = 10; // 總共的概念數
		$NEW_GENERATION = 30; // 輪盤法取幾個染色體
		$MUTATION_NUM = 1; // 每幾代會突變一次
		$QUESTION_NUM = 10; // 每個染色體應具備的題數
        

        $cAllArr = array(); // 所有題目的概念比率 二維陣列[SIZE][CONCEPT]
	    $ciQ = array(); // 使用者每個觀念的強度[CONCEPT]
	    $fitnessAvg_Arr = array(); // 每一代的平均適應值
	    $bestFitArr = array();//[GENERATION_NUM]
	    $ranBestFitArr = array();//[GENERATION_NUM]

	    $quesNum; // 取得的題號
	    $bestChrom = ""; // 最佳的染色體
	    $bestFit = $QUESTION_NUM; // 假設一開始的最好Fit值為最大的Fit值
	    $ranBestFit = $QUESTION_NUM;
        

        //自設
        runGA($analysis);
        for($i=0;$i<count($ciQ);$i++){
        	echo $ciQ[$i]."<br>";
        }
        $_SESSION["ciQ"]=$ciQ;
		$_SESSION["quesNum"]=$quesNum;
		unset($_SESSION["gene_voc"]);
		unset($_SESSION["gene_topic"]); 
		unset($_SESSION["gene_size"]);
		unset($_SESSION["quest_gene"]);
		unset($_SESSION["gene_test"]);
        header("Location: draw.php");
        //自設


 	function runGA($analysis){
 	    global $ciQ;//必須
		global $bestChrom;
		global $quesNum;
		$sum = 0;
		for($i=0; $i<count($analysis);$i++){
				$sum = $sum +$analysis[$i]; 
		}
		for($i=0; $i<count($analysis);$i++){
			if($analysis[$i] == 0)
				$ciQ[$i] = 0;			
			else
				$ciQ[$i] =$analysis[$i]/$sum;			
		}
		$sum = 0;		
		$bestChrom=getNChromosome();
		getQuesNum($bestChrom);
		return $quesNum;
	}

        // 產生第n代染色體，回傳的是最好的染色體↓
	    function getNChromosome(){
	    	global $QUESTION_NUM;
	    	global $ciQ;//必須
	    	global $bestFit;
	    	global $fitnessAvg_Arr;
	    	global $NEW_GENERATION;
	    	global $MUTATION_NUM;
	    	global $cAllArr;
	    	global $userQ;
	    	global $userRQ;// ex-測試題目每題的觀念比率
	    	$bestChrom = "";
	    	$bestFit = 5;//為什麼要設成5(?
	    	getcAll();
	    	getCiQ($userQ, $userRQ);

			$chromosome = generatePool();// 隨機產生一組染色體
			$fitValueArr = array(); // 放置每個染色題的fit值
			$proValueArr = array(); // 放置每個染色體被抽到的機率值
			$wheelChromosome = array(); // 輪盤法後取得的染色體
			$crossChromosome = array();//[NEW_GENERATION * NEW_GENERATION] crossover後取得的染色體
            global $GENERATION_NUM;
			for ($i = 0; $i < $GENERATION_NUM; $i++) {
				$nowBest = 5;
				for ( $j = 0; $j < count($chromosome); $j++) {
					$Qnum = getQNum($chromosome[$j]);
					if ($Qnum >= round(0.8 * $QUESTION_NUM)&& $Qnum <= round(1.2 * $QUESTION_NUM)){
						if (getFitness($chromosome[$j]) <= $bestFit) {
							$bestFit = getFitness($chromosome[$j]);
							$bestChrom = $chromosome[$j];
						}
						if (getFitness($chromosome[$j]) <= $nowBest) {
							$nowBest = getFitness($chromosome[$j]);
						}
					}
				}
           
				for ($j = 0; $j < count($chromosome); $j++) {
					$fitValueArr[$j] = getFitness($chromosome[$j]);
				}
				$fitnessAvg_Arr[$i] = getFitAvg($fitValueArr); // 計算每代的fit平均值
				$bestFitArr[$i] = $nowBest;
				$proValueArr = getProbability($fitValueArr);
				for ($j = 0; $j < $NEW_GENERATION; $j++) {
					$wheelChromosome[$j] = wheelSelect($proValueArr, $chromosome);
				}
				$crossChromosome = crossover($wheelChromosome);
				// 幾代突變一次
				if ($i % $MUTATION_NUM == 0) {
					$crossChromosome = mutation($crossChromosome);
				}
				$chromosome = $crossChromosome;
			}
            	return $bestChrom;
	    }


	// 染色題中選中幾題↓
	function getQuesNum($chromo) {
        global $quesNum;
		$count = 1;
		$quesTemp = "";
		for ($i = 0; $i <  strlen($chromo); $i++) {
			if (substr($chromo,$i-1,1) == '1'){
				$quesTemp = $quesTemp . $count . " ";
            }
			$count++;
		}
		$quesNumString = explode(" ",$quesTemp);
		$quesNum = array();
        echo "取出來的題目: <br>";
		for ($i = 0; $i < count($quesNumString); $i++){
			$quesNum[$i] = $quesNumString[$i];
			echo $quesNum[$i]."&nbsp";
		}
	}

	// 從txt檔中取題目的概念比率↓
	function getcAll() {
		global $cAllArr;
		$i = 0;


       $myfile = fopen("voc.txt", "r") or die("Unable to open file!");
	   // 输出单行直到 end-of-file
	   while(!feof($myfile)) {

	   	    $str=fgets($myfile);//fgets()會逐行讀取
	   	    $strarr=explode(" ",$str);
			for($j = 0; $j < count($strarr); $j++) {
				$cAllArr[$i][$j] = $strarr[$j];
			}
			$i++;	   	
	   }
	   fclose($myfile);
	   return $cAllArr;
    }

	// 隨機產生一群染色體
	function generatePool() {
		global $SIZE;
		global $CHROMOSOME_NUM;
		global $QUESTION_NUM; 
		$ret = array();
		$chromCount = 0;
		while ($chromCount != $CHROMOSOME_NUM) {
			$tmp = "";
			for ($j = 0; $j < $SIZE; $j++) {
				if (rand(0,$SIZE) >= $QUESTION_NUM)// @@ 12/25 5.09 by tofu
					$tmp = $tmp . "0";
				else
					$tmp = $tmp . "1";
			}
			$qNum = getQNum($tmp);
			if ($qNum == $QUESTION_NUM) {
				$ret[$chromCount] = $tmp;
				$chromCount++;
			}


		}
		return $ret;
	}

	// ---------------------找出最適合的染色體---------------------------

	// 取得適應值平均值
	function getFitAvg($fitValue) {
		$sum = 0;
		for ($i = 0; $i < count($fitValue); $i++) {
			$sum = $sum + $fitValue[$i];
		}
		$avg = $sum / count($fitValue);
		return $avg;
	}

	// ---------------------找出適應值---------------------------
	// 取得使用者每個觀念的強度
	function getCiQ($userQ, $userRQ) {
		global $ciQ;
		$sumConcept = 0; // 每個概念所佔的比率總和
		$sumRConcept = 0; // 正確題目概念所佔的比率總和

		$count = 0;
		$a = 0;
		while ($count != $CONCEPT) {
			for ($i = 0; $i < count($userQ); $i++) {
				$sumConcept = $sumConcept + $userQ[$i][$count];
				$sumRConcept = $sumRConcept + $userRQ[$i][$count];
			}
			$ciQ[$count] = 1 - ($sumRConcept / $sumConcept);
			$a = $a + $ciQ[$count];
			$sumConcept = 0;
			$sumRConcept = 0;
			$count++;
		}
		for ($i = 0; $i < $CONCEPT; $i++) {
			if($a == 0){
				$ciQ[$i] = 0;
			}
			else{
				$ciQ[$i] = $ciQ[$i] / $a;
			}
		}
	}

	//依題號取得概念比率
	function getConcept($qNum) {
		$quesConcept = array();
		$quesConcept[0] = $cAllArr[$qNum];
		return $quesConcept;
	}

	// 取得chromosome每題佔的觀念比率
	function getChromoConcept($chrom) {
		global $cAllArr;
		$count = 0;
		$qNum = getQNum($chrom);
		$chromCon = array();
		for ($i = 0; $i < strlen($chrom); $i++) {
			if (substr($chrom,$i-1,1) == '1') {
				$chromCon[$count] = $cAllArr[$i];
				$count++;
			}
		}
		return $chromCon;
	}

	// 計算題數
	function getQNum($chrom) {
		$count = 0;
		for ($i = 0; $i < strlen($chrom); $i++) {
			if (substr($chrom,$i-1,1) == '1')
				$count++;
		}
		return $count;
	}

	// 取得該染色觀念強度
	function getCbiQ($chromo) {
		global $CONCEPT; 
		$sumConcept = 0; // 每個概念所佔的比率總和
		$count = 0;
		$cbiQ = array();
		$chromCon = getChromoConcept($chromo);
		$qNum = getQNum($chromo); // 取得該染色體題數
		while ($count != $CONCEPT) {
			for ($i = 0; $i < $qNum; $i++) {
				$sumConcept = $sumConcept + $chromCon[$i][$count];
			}
			$cbiQ[$count] = $sumConcept / ($qNum * 100);
			$sumConcept = 0;
			$count++;
		}
		return $cbiQ;
	}

	// 計算fitness值
	function getFitness($chromo) {
		global $CONCEPT;
		global $ciQ;
		$qNum = getQNum($chromo);
		if ($qNum == 0) {
			return 0;
		} else {
			$cbiQ = getCbiQ($chromo);
			$fitValue = 0;
			for ($i = 0; $i < $CONCEPT; $i++) {
				$temp = abs($ciQ[$i] - $cbiQ[$i]);
				$fitValue = $fitValue + $temp;
			}
			return $fitValue;

		}
	}

	// ---------------------輪盤法---------------------------

	// 取得每個染色體被選中的機率
	function getProbability($fitness) {

		$sum = 0; // 適應值加總
		$fit = array();
		for ($i = 0; $i < count($fitness); $i++) {
			//sum += 10 - fitness[i];
			$sum +=( 1/$fitness[$i])*( 1/$fitness[$i]);
		}
		for ($i = 0; $i < count($fitness); $i++) {
			//fit[i] = (10 - fitness[i]) / sum; // 適應值占的機率
			$fit[$i] = (1/ $fitness[$i])*( 1/$fitness[$i]) / $sum; // 適應值占的機率
			if ($i != 0) {
				$fit[$i] += $fit[$i - 1]; // 適應值占的機率範圍
			}
		}
		return $fit;
	}

	// 輪盤法選擇
	function wheelSelect($probability, $chromosome) {
		$num = rand(0,99)/100;//random(0.00~0.99
		// System.out.println("random= "+num);
		for ($i = 0; $i < count($probability); $i++) {
			if ($probability[$i] > $num) { // 找出哪一題
				return $chromosome[$i];
			}
		}

		return $chromosome[count($chromosome) - 1];
	}

	// ---------------------交配及突變---------------------------

	function crossover($chromsomeArr) {
		global $SIZE;
		global $NEW_GENERATION;
		$count = 0;
		$newgenes = array();
		for ($i = 0; $i < $NEW_GENERATION; $i++) {
			for ($j = 0; $j < $NEW_GENERATION; $j++) {
				$str="";
	
				for($m = 0; $m < $SIZE; $m++){
					$num = rand(0,99)/100;//random(0.00~0.99)
					if($num<0.5){
						$str.=substr($chromsomeArr[$i],$m-1,1);
					}
					else{
						$str.=substr($chromsomeArr[$j],$m-1,1);
					}
				}
				
				// System.out.println(str);
				$newgenes[$count] = $str;
				$count++;
			}
		}
		return $newgenes;
	}
	
	// 染色體突變
	function mutation($chromsomeArr) {
		global $SIZE;
		$ranNumChrom = rand(0,count($chromsomeArr));
		// System.out.println("尚未突變前的染色體：" + chromsomeArr[ranNumChrom]);
		$ch = $chromsomeArr[$ranNumChrom];//chromsomeArr[ranNumChrom].toCharArray()
		$ranNum = rand(0,$SIZE); // 隨機產生一個亂數，代表要改變基因的位置
		if ($ch[$ranNum] == '0') { // 把基因0變1，1變0
			$ch[$ranNum] = '1';
		} else {
			$ch[$ranNum] = '0';
		}
		// System.out.println("突變後的染色體：" + chromsomeArr[ranNumChrom]);
		return $chromsomeArr;
	}								    
?>