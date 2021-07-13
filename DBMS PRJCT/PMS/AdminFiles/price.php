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
$id = $_GET["MID"];
$ppq = $_POST["ppq"];

$sql = "UPDATE medicine_inventory SET PPQ='$ppq' WHERE MID='$id'";  
if ($conn->query($sql) === TRUE) {
    $corr_mess="Price has been set";
} else {
    $err_mess="Unknown Error Occured";
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
.ui.card{
  margin:10%;
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
      <a href="admindashboard.php" class="ui item">
        <h4>Home</h4>
        </a>
        <a href="logout" class="ui item">
        <h4>Logout</h4>
        </a>
    </div>
</div>
<h1 class="sell_head">Medicine Details</h1>
<div class="ui centered container">
  <div class="ui fluid card" style="text-align:center; width:80%;">
  <?php 
    if(!empty($err_mess)){
        echo '<h2>'.$err_mess.'</h2>';
    }        
    if(!empty($corr_mess)){
      echo '<h2>'.$corr_mess.'</h2>';
    }         
    ?>
    <center>
      <button class="secondary ui button" style="width:25%;">
          <a href="admindashboard.php" style="color:white" >Go Back to Home Page</a>
      </button>
      </center>
</div>
</div>
</div> 
</body>
</html>