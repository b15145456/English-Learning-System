
<!-- 掃描指定資料夾全部圖檔 指定處"..\txtfile\".TIME.".php"產生TXT檔案(以時間命名) -->
 <?php
 	require_once "..\src\TesseractOCR.php";
    //輸出Array ( [0] => . [1] => .. [2] => img [3] => index.php)
    $dir = scandir(__DIR__);
    $dirLength = count($dir)-1;

    // $my_file = date("Ymd-His").".txt";
    $uploadArr = array();
    for ($i=2; $i <= $dirLength ; $i++) { 
        if (strpos($dir[$i],'gif')||strpos($dir[$i],'jpg')||strpos($dir[$i],'jpeg')||strpos($dir[$i],'png')!=0){   //strops：查找png在字串中($dir[$i])位置

            $a = new TesseractOCR($dir[$i]);
            $b = $a->run();

            echo "$b"."<br>";
            array_push($uploadArr, $b);
            print_r($uploadArr);
            // $my_file = 'file.txt';
            // $handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
            //create file
            // fwrite($handle,"$b\r\n");
            //write in
        }else{
        }
    }
    // fclose($handle);
?>
