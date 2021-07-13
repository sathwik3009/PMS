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
<div class="ui huge header" style="text-align:center;color:white;">Welcome </div>
<center>
<div class="ui huge header" style="text-align:center;color:white;">List Of Medicines</div>
<div>
<hr  style="width:75%;">


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
  $sessEmail = $_SESSION["user_email"];
  $query1 = "SELECT* FROM Buyer WHERE Buyer_Email='$sessEmail'";
  $result = mysqli_query($conn,$query1);
	$count  = mysqli_num_rows($result);
  if($count==0){
    $verify_err_mess="Invalid Email / Password";
  }
  else{
    while($row = $result->fetch_assoc()){
      $tableId =$row["Buyer_ID"];
      $name = $row["Buyer_Name"];
      $contact = $row['Buyer_Contact'];
      $address = $row['Buyer_Address'];
  }
  $_SESSION['user_id'] = $tableId;
  $_SESSION['user_name'] = $name;
  $_SESSION['contact'] = $contact;
  $_SESSION['address'] = $address;
//  echo   $_SESSION["user_name"];

  $query2 = "SELECT* FROM medicine_inventory";
  $result = mysqli_query($conn, $query2);
  $count = mysqli_num_rows($result);

  $sno = 1;
  $buy='Buy';
  echo "
  <table class='ui celled table' style='width:75%;'>
      <thead>
      <tr>
          <th>SNO</th>
          <th>MEDICINE ID</th>
          <th>MEDICINE NAME</th>
          <th>MEDICINE STOCK</th>
          <th>PRICE PER QUANTITY</th>
          <th>BUY<th>
      </tr>
      </thead>
      <tbody>
      ";
      while($row = mysqli_fetch_array($result)){
      echo "

      <tr>
      <form method='post' action='buyerbill.php?MName=".$row['MName']."&&MQ=".$row['MQuantity']."&&PPQ=".$row['PPQ']."'>
          <td>" . $sno . "</td>
          <td>" . $row['MID'] . "</td>
          <td>" . $row['MName'] . "</td>
          <td>" . $row['MQuantity'] . "</td>
          <td>" . $row['PPQ'] . "</td>
          <td><button class='ui secondary button' type='submit'>
          ".$buy."
        </button></td>
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
</body>
</html>
