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

    <a class="ui item" href="customer.php">
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
<div class="ui huge header" style="text-align:center;color:white;">Confirmed Orders</div>
<div>
<hr  style="width:75%;">
<center>
<div style="width:75%">
<?php
session_start();
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "pms";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id2=$_SESSION['user_id'];

$query2 = "SELECT * FROM sale_order WHERE BID='$id2'";
$result = mysqli_query($conn, $query2);
$count = mysqli_num_rows($result);
if($count == 0){
    echo "<h1 style='text-align:center; color:white;'>No Accepted Orders</h1>";
}
else{
$sno = 1;
$buy='Download';
echo "
<table class='ui celled table'>
    <thead>
    <tr>

        <th>SALE NO</th>
        <th>BUYER ID</th>
        <th>MEDICINE NAME</th>
        <th>QUANTITY</th>
        <th>DATE</th>
        <th>PAYMODE</th>
        <th>TOTAL AMOUNT</th>
        <th>DAYS</th>
        <th>DOWNLOAD</th>
    </tr>
    </thead>
    <tbody>
    ";
    while($row = mysqli_fetch_array($result)){
    echo "
    <tr>
    <form method='post' action='buyerbillsdownload.php?date=".$row['BUY_DATE']."&&DAYS=".$row['DAYS_NO']."&&AMT=".$row['AMOUNT']."&&SONO=".$row['SONO']."&&MName=".$row['MNAME']."&&MQ=".$row['MQUANTITY']."&&PAYMODE=".$row['PAY_MODE']."'>
        <td>" . $row['SONO'] . "</td>
        <td>" . $row['BID'] . "</td>
        <td>" . $row['MNAME'] . "</td>
        <td>" . $row['MQUANTITY'] . "</td>
        <td>" . $row['BUY_DATE'] . "</td>
        <td>" . $row['PAY_MODE'] . "</td>
        <td>" . $row['AMOUNT'] . "</td>
        <td>". $row['DAYS_NO']."</td>
        <td><button class='ui secondary button' type='submit' name='submit'>Download</button></td>
      </form>
    </tr>";
    $sno++;
    }
echo "
</tbody>
</table>";
}
$conn->close();
?>
</div>
</center>

</body>
</html>
