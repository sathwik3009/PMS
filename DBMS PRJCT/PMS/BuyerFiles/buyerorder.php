<?php
session_start();
$q = $_SESSION['QUA'];
$total_amt=$_SESSION['AMT'];
$bname = $_SESSION['user_name'];
$mname = $_SESSION['MName'];
$contact = $_SESSION['contact'];
$address = $_SESSION['address'];
$id = $_SESSION['user_id'];
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "pms";
$corr_mess="";
$pay=$_POST['pay_mode'];
$sno = mt_rand(0,10000000);
$corr_mess="";
$err_mess="";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="INSERT INTO temp_sale_order (SONO,BID,BNAME,BCONTACT,BADDRESS,MNAME,MQUANTITY,AMOUNT,PAY_MODE) 
  VALUES ('$sno','$id','$bname','$contact','$address','$mname','$q','$total_amt','$pay')";
  if ($conn->query($sql) === TRUE) {
     $corr_mess="Purchase Order has been Placed";
     } else {
        $err_mess=$conn->error;
      }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Buyer</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
  <style>
  body{
      background-color: #37414b;
      background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
  }
  </style>
</head>
<body>
<div class="ui secondary menu navbar" style="padding:3px; background-color:white;">
  <a class="ui item">
  <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
  <div class="right menu">
    <a href="buyerhome.php" class="ui item">
    <h4>Home</h4>
    </a>
    <a href="buyerplacedorders.php" class="ui item">
    <h4>Confirmed Orders</h4>
    </a>
    <a href="buyersearch.php" class="ui item">
    <h4>Search info</h4>
    </a>
    <a href="buyerpendingorders.php" class="ui item">
    <h4>Placed Orders</h4>
    </a>
    <a href="logout.php" class="ui item">
    <h4>Logout</h4>
    </a>
  </div>
</div>
<center>
<div class="ui centered grid container">
  <div class="nine wide column">
    <div class="ui fluid card" style="margin-top:15%;">
      <div class="content" style="text-align:center; height:30vh;">
        <?php 
        if(!empty($err_mess)){
            echo '<div class="ui negative message" id="errorMsg" style="width:100%;">
            <i class="close icon" onclick="closeDiv1()"></i>
            <div class="header"  style="margin:2%;">
            '.$err_mess.'
            </div>
            <p>Please try again</p></div>';
        }        
        if(!empty($corr_mess)){
            echo '<div class="ui positive message" id="corrMsg" style="width:100%;">
            <i class="close icon" onclick="closeDiv2()"></i>
            <div class="header" style="margin:2%;">'.$corr_mess.'</div>
            <p>Waiting for Approval from Seller</p>
            <p>You can check the placed orders in <a href="buyerpendingorders.php">Placed Orders</a></p></div>';
        }        
        ?>
      </div>
    </div>
  </div>
</div>
</center>
<script>
    function closeDiv1(){
        document.getElementById('errorMsg').style.display='None';
    }
    function closeDiv2(){
        document.getElementById('corrMsg').style.display='None';
    }
</script>
</body>
</html>
