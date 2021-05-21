<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
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
  .open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
  transition: 0.5s;
}

.form-popup {
  display: none;
  position:fixed ;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

.form-container input[type=text], .form-container input[type=password],
.form-container input[type=number],.form-container input[type=email]  {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}
.form-container input[type=text]:focus, .form-container input[type=password],
.form-container input[type=number],.form-container input[type=email] :focus {
  background-color: #ddd;
  outline: none;
}
.form-container .btn {
  background-color: black;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

.form-container .cancel {
  background-color: red;
}
.closebtn{
position: absolute;
top: 20px;
right: 45px;
font-size: 60px;
transition: 1s;
}
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
.ui.card{
  margin:10%;
}
.ui.fluid.button{
  margin:5%;
  margin-left:auto;
  margin-right:auto;
  width: 20% !important;;
}
th,td{
  max-width:80px;
  text-align:center !important;
}
.sell_head{
  text-align:center!important;
  color:white;
  font-family:'sans-serif';
  font-weight:700;
  margin:3%;
}

  </style>
</head>
<body>
<div class="ui secondary menu navbar" style="padding:3px; background-color:white;">

    <a class="ui item">
    <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
    <div class="right menu">
    <a href="/admin.php" class="ui item">
        <h4>Home</h4>
        </a>
        <a href="setprice.php" class="ui item">
        <h4>Set Price</h4>
        </a>
        <a href="buymed.php" class="ui item">
        <h4>Buy Medicines</h4>
        </a>
        <a href="pending.php" class="ui item">
        <h4>Approve Orders</h4>
        </a>   
        <a href="editadm.php" class="ui item">
        <h4>Edit Medicine Stock</h4>
        </a>
        <a href="/" class="ui item">
        <h4>Logout</h4>
        </a>
    </div>
</div>
<h1 class="sell_head">Medicine Details</h1>
<div class="ui centered container">
  <div class="card">
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

$query2 = "SELECT * FROM medicine_inventory";
$result = mysqli_query($conn, $query2);
$count = mysqli_num_rows($result);
if($count == 0){
    echo "<h1 style='text-align:center; color:white;'>No Medicine stock currently</h1>";
}
else{
$sno = 1;
echo "
<table class='ui celled table'>
    <thead>
    <tr>
        <th>SNO</th>
        <th>MEDICINE ID</th>
        <th>MEDICINE NAME</th>
        <th>MEDICINE STOCK</th>
        <th>PRICE PER QUANTITY</th>
    </tr>
    </thead>
    <tbody>
    ";
    while($row = mysqli_fetch_array($result)){
    echo "
    <tr>
        <td>" . $sno . "</td>
        <td>" . $row['MID'] . "</td>
        <td>" . $row['MName'] . "</td>
        <td>" . $row['MQuantity'] . "</td>
        <td>" . $row['PPQ'] . "</td>
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
 <button class="ui fluid button">
    <a href="/buymed.php" style="color:#37414b;">Add New Medicine</a>
  </button>
</div>
</div> 
</body>
</html>