<?php 
   session_start();
   $ciQ=$_SESSION["ciQ"];
   include("voc.php");
   $gene_test=array();
   $quesNum=array_values($_SESSION["quesNum"]);
   for($i=0;$i<count($quesNum);$i++){
	   for($j=0;$j<count($A);$j++){
	if($quesNum[$i]==$j){
		$gene_test[$i] = $A[$j];
		}
	   }
   }
   $_SESSION["gene_test"]=$gene_test;
   $_SESSION["gene_topic"]=$gene_test[0];
   $_SESSION["gene_voc"]=$gene_test[0][0];
   $_SESSION["quest_gene"]=1;
   
   $_SESSION["gene_size"]=count($quesNum);
   //print_r($quesNum);
   //echo $gene_test_r[0][0];
   //echo $gene_test_r[1][0];
   //echo $_SESSION["gene_size_r"];
   
   unset($_SESSION["analysis"]);
   unset($_SESSION["userQ"]);
   unset($_SESSION["userRQ"]);
   unset($_SESSION["u_answer"]);
   //header("Location : gene_test.php");
?>

<html lang="en">
	<head>
	<title>Main</title>
	<style>
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
		background: url(images/gene.jpg);
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
	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body id="main">
	<div class="jumbotron text-center">
	  <h2>基因-結果頁面</h2>
	  <p></p>
	</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<div class="container">
	  <div class="row" width="300" border="1">
	<div class="col-sm-4">
	</div>
	<div style="width:800px;" class="col-xl-4">
  		<canvas id="heyChart"></canvas>
	</div>
	<div class="col-sm-4">
	</div>
	</div>
	<div class="row" width="300" border="1">
	<div class="col-sm-4">
		</div>
		<div class="col-lg-4">
		<input class="a" type="submit" value="產生題目" onclick="location.href='gene_test.php'">
		
		<input class="a" type="submit" value="回首頁" onclick="location.href='main.php'">
	</form>
	</div>
	<div class="col-sm-4">
	</div>
	</div>
	</div>
  <script>
  var ctx = document.getElementById("heyChart");
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["觀念1", "觀念2", "觀念3", "觀念4", "觀念5","觀念6", "觀念7", "觀念8", "觀念9", "觀念10"],
      datasets: [{
        label: '目前觀念百分比率(%)',
        data: [<?php echo $ciQ[0]*100 ?>, <?php echo $ciQ[1]*100 ?>, <?php echo $ciQ[2]*100 ?>,<?php echo $ciQ[3]*100 ?>, <?php echo $ciQ[4]*100 ?>,<?php echo $ciQ[5]*100 ?>,<?php echo $ciQ[6]*100 ?>, <?php echo $ciQ[7]*100 ?>, <?php echo $ciQ[8]*100 ?>, <?php echo $ciQ[9]*100 ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true,
          }
        }]
      }
    }
  });
  </script>
</body>
</html>