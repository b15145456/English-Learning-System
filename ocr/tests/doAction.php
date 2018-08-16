<?php
/**
 * 表單接收頁面
 */

// 網頁編碼宣告（防止產生亂碼）
// header('content-type:text/html;charset=utf-8');
// 封裝好的單一及多檔案上傳 function
include_once 'upload.func.php';
// 重新建構上傳檔案 array 格式
$files = getFiles();

// 依上傳檔案數執行
foreach ($files as $fileInfo) {
    // 呼叫封裝好的 function
    $res = uploadFile($fileInfo);

    // 顯示檔案上傳訊息

    // 上傳成功，將實際儲存檔名存入 array（以便存入資料庫）
    if (!empty($res['dest'])) {
        $uploadFiles[] = $res['dest'];
    }
}  

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

            array_push($uploadArr, $b);
            unlink($dir[$i]);
            // $my_file = 'file.txt';
            // $handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
            //create file
            // fwrite($handle,"$b\r\n");
            //write in
        }else{
        }
    }
	session_start();
	$_SESSION["uploadArr"]=$uploadArr;
	//echo "<p>掃描成功</p>";
    //print_r($uploadArr);
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
	<body id="main" background="../images/ocr.jpg">
	<div class="jumbotron text-center">
	<h2>ocr-掃描結果...</h2>
	<p></p>
	</div>
	<div class="container">
	<div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-lg-4">
	<br><br>
	<table>
			<tr>
			<td>檔案順序</td><td>掃描結果</td>
			</tr>
			<?php for($i=0;$i<count($_SESSION["uploadArr"]);$i++){ ?>
			<tr>
			<td><?php echo $i+1; ?></td><td><?php echo $_SESSION["uploadArr"][$i]; ?></td>
			</tr>
			<?php } ?>
	</table>
		<br><br>
		<input class="a" type="submit" value="產生題目" onclick="location.href='compare.php'">
	</form>
		<br><br><br>
	</div>
    <div class="col-sm-4">
    </div>
	</div>
	</div>	

	</body>
	</html>
 
	
	
	



