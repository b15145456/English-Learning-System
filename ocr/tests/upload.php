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
<body id="example1" background="../images/ba1.jpg">
    
<div class="jumbotron">
  <h1>OCR模式-上傳頁面</h1>
  <p></p>
</div>	
	<div class="container">
	  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-lg-4">
      <h1>測驗說明:</h1>
	  <br>
      <h4>此為OCR-mode的上傳頁面，</h4>
      <h4>請選擇欲掃描且含有單字的圖片，</h4>
	  <h4>可以一次選擇多張圖片，</h4>
	  <h4>掃描的結果會於下一頁顯示。</h4>
	  <h4>可再利用掃描的結果產生題庫內有的單字測驗。</h4>
	<br><br><br>
    </div>
	
    <div class="col-sm-4">
    </div>
  </div>
 
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-lg-4">
	<form action="doAction.php" method="post" enctype="multipart/form-data">
    <!-- 限制上傳檔案的最大值 -->
    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">

    <!-- accept 限制上傳檔案類型。多檔案上傳 name 的屬性值須定義為 array -->
    <!-- 使用 html 5 實現單一上傳框可多選檔案方式，須新增 multiple 元素 -->
    <input type="file" name="myFile[]" id="" accept="image/jpeg,image/jpg,image/gif,image/png" multiple>
	<br><br><br>
	</div>
    <div class="col-sm-4">
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-lg-4">
	<button class="a" type="button" onclick="location.href='http://localhost/main.php'">回上一頁</button>
     <input class="a" type="submit" value="上傳檔案">
	 </form>
	<br><br><br>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
  
  </div>
</body>
</html>