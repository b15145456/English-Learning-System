<html lang="en">
<head>
  <title>Main</title>
  <style type="text/css">
 .a{
    border: none;
    display: inline-block;
    outline: 0;
    padding: 20px 70px;
    vertical-align: middle;
    overflow: hidden;
    text-decoration: none;
    color: white;
    background-color: black;
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
	font-size:30px;
	}
	#example1 {
		background: url(images/vs.jpg);
		background-repeat: no-repeat;
		background-size:cover;
	}
	.jumbotron {
    background-color:black !important; 
	
	}
	.jumbotron h1 {
	font-family:Microsoft JhengHei !important;
	color: white!important;
	}
	.jumbotron h3 {
	font-family:Microsoft JhengHei !important;
	color: white!important;
	}


  </style>	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body id="example1">

<div class="jumbotron text-center">
  <h1>Happy - Spelling</h1>
  <h3>choose your mode!</h3>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12 text-center">
      <button   class="a" type="button" onclick="location.href='gene_front.php'">gene</button>
	  <h3></h3>
      <p></p>
    </div>
	<div class="col-md-3 col-sm-6 col-xs-12 text-center">
      <button class="a" type="button" onclick="location.href='ocr/tests/upload.php'">OCR!</button>
	  <h3></h3>
      <p></p>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12 text-center">
      <button   class="a" type="button" onclick="location.href='classical_select.php'">classic</button>
	  <h3></h3>
      <p></p>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12 text-center">
	  <button   class="a" type="button" onclick="location.href='explain.php'">all star!</button>
      <p></p>
    </div>
  </div>
</div>

</body>
</html>