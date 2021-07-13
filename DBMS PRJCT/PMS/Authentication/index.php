<?php
session_start(); // Starting Session
$err=''; // Variable To Store Error Message
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "pms";
if($_SERVER["REQUEST_METHOD"] == "POST"){

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email=$_POST['email'];
$password=$_POST['password'];
$tableName=$_POST['tname'];
$adminEmail = "admin123@gmail.com";
$adminPassword = "adminpms123";

if($tableName == 'Admin'){
    if($email== $adminEmail && $password==$adminPassword){
      $_SESSION["user_email"]=$email;
      $_SESSION["user_pwd"]=$password; 
      header("Location: ./admindashboard.php");
    }
    else{
        $err="Invalid Email or Password!";
    }
}
else{
    $em = $tableName."_Email";
    $ps = $tableName."_Password";
    $id = $tableName."_ID";
    $tb = strtolower($tableName);
    $query = mysqli_query($conn,"SELECT * FROM  $tb WHERE $em= '$email' AND $ps='$password'");
    $rows = mysqli_num_rows($query);
    if ($rows == 1) {
        $_SESSION['user_email']=$email; 
        $_SESSION["user_pwd"]=$password; 
        if($tableName == "Buyer"){
            header("Location: ./buyerhome.php");
        }
        else{
            header("Location: ./sellerhome.php");
        }
    } else {
        $err = "Invalid Email or Password!";
    }
        
}
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
<style>
    .field{
        padding:10px;
    }
    body{
        background-color: #37414b;
        background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
    }
    .card{
        border-radius: 10px;
    }
</style>
</head>
<body>
<div class="ui secondary menu navbar" style="padding:3px; background-color:white;">
    <a class="ui item">
    <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
    <div class="right menu">
        <a href="/" class="ui item">
        <h4>Login</h4>
        </a>
        <a href="signup.html" class="ui item">
        <h4>Signup</h4>
        </a>
    </div>
</div>
<div class="page-login main-body" style="margin:40px">
  <div class="ui centered grid container">
    <div class="nine wide column">
      <div class="ui fluid card">
        <div class="content">
        <?php 
        if(!empty($err)){
            echo '<div class="ui negative message">' . $err . '</div>';
        }        
        ?>
        <form class="ui large form" action="" method="post">
          <h2 class="ui center aligned icon header">
            <i class="circular users icon"></i>
            Login Page
          </h2>
          <div class="field">
            <label>Email</label>
            <input type="text" name="email" placeholder="Enter Email">
          </div>

          <div class="field">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter Password">
          </div>
          <div class="field">
            <!-- <label>Type</label> -->
          <select name="tname" class="ui dropdown">
            <option value="" >Select User Type</option>
            <option value="Admin" name="tname">Admin</option>
            <option value="Buyer" name="tname">Buyer</option>
            <option value="Seller" name="tname">Seller</option>
          </select>
        </div>
        <div style="display:flex; justify-content:space-evenly; padding:10px;">
            <button class="ui secondary button" type="submit">
                <!-- <i class="unlock alternate icon"></i> -->
                Login
              </button>
              </form>
              <button class="ui inverted secondary button" type="" >
                <a href="signup.html" style="color:white">Sign up</a>
              </button>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>