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
$conn->close();
?>
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
.ui.fluid.card{
  width:30%;
  height:30%;
  margin:4.5%;
}
.admin__head{
  text-align:center!important;
  color:white;
  font-family:'sans-serif';
  font-weight:700;
  margin-top:3%;
}
.card__head{
  text-align:center!important;
  font-weight:700;
  margin:3% !important;
}
.row{
    display:flex;
    justify-content:space-evenly;
}
.admin-body{
    display:flex;
    flex-direction:column;
}
.ui.centered.container{
    margin-top:0;
}
</style>
</head>
<body>
<div class="ui secondary menu navbar" style="padding:3px; background-color:white;">
    <a class="ui item">
    <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
    <div class="right menu">
        <a href="/admindashboard.php" class="ui item">
        <h4>Home</h4>
        </a>
        <a href="/admin.php" class="ui item">
        <h4>View Inventory</h4>
        </a>
        <a href="setprice.php" class="ui item">
        <h4>Set Price</h4>
        </a>
        <a href="buymed.php" class="ui item">
        <h4>Buy Medicines</h4>
        </a>
        <a href="" class="ui item">
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
<h1 class="admin__head">Admin Dashboard</h1>
<div class="ui centered container">
<div class="admin__body">
  <div class="row">
    <div class="ui fluid card">
        <div class="content" >
            <div class="center aligned header"><h3 class="card__head">MANAGE BUYER REQUESTS</h3></div>
            <div class="center aligned description">
            <a href="adminbuyer.php" ><p><i class="massive users icon"></i></p></a>
            </div>
        </div>
    </div>
    <div class="ui fluid card">
    <div class="content">
    <div class="center aligned header"><h3 class="card__head">VIEW MEDICINE INVENTORY</h3></div>
    <div class="center aligned description">
    <a href="editadm.php"><p><i class="massive eye icon"></i></p></a>
    </div>
  </div>
  
    </div>
    <div class="ui fluid card">
    <div class="content">
    <div class="center aligned header"><h3 class="card__head">EDIT MEDICINE INVENTORY</h3></div>
    <div class="center aligned description">
    <a href="editadm.php"><p><i class="massive pencil icon"></i></p></a>
    </div>
  </div>
  
    </div>
  </div>
  <div class="row">
    <div class="ui fluid card">
    <div class="content">
    <div class="center aligned header"><h3 class="card__head">BUY MEDICINES</h3></div>
    <div class="center aligned description">
    <a href="editadm.php"><p><i class="massive plus icon"></i></p></a>
    </div>
  </div>
    </div>
    <div class="ui fluid card">
    <div class="content">
    <div class="center aligned header"><h3 class="card__head">SET MEDICINE PRICE</h3></div>
    <div class="center aligned description">
    <a href="editadm.php"><p><i class="massive rupee sign icon"></i></p></a>
    </div>
  </div>
  
    </div>
  </div>
  </div>
</div>
</div>
</div> 
</body>
</html>
