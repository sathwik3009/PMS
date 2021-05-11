<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "pms";

$login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$adminEmail = "admin123@gmail.com";
$adminPassword = "adminpms123";
$tableName = $_POST['tname'];
$email = $_POST['email'];
$password = $_POST['password'];

if($tableName == 'Admin'){
    if($email== $adminEmail && $password==$adminPassword){
      $login_err = "";
      header("Location: ./admin.html");
    }
    else{
        $login_err="Invalid Username or Password!";
        // header("Location: ./error.html");
    }
}
else{
    $em = $tableName."_Email";
    $ps = $tableName."_Password";
    $tb = strtolower($tableName);
    $query ="SELECT * FROM  $tb WHERE $em= '$email' AND $ps='$password'";
    $result = mysqli_query($conn,$query);
	$count  = mysqli_num_rows($result);
	if($count==0) {
		// echo "Invalid Username or Password!";
    $login_err="Invalid Username or Password!";
	} else {
		if($tableName == "Buyer"){
            header("Location: ./buyer.html");
        }
        else{
            header("Location: ./customer.html");
        }
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
        <a href="login1.html" class="ui item">
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
        if(!empty($login_err)){
            echo '<div class="ui negative message">' . $login_err . '</div>';
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
            <option value="Customer" name="tname">Customer</option>
          </select>
        </div>
        <div style="display:flex; justify-content:space-evenly; padding:10px;">
            <button class="ui secondary button" type="submit">
                <!-- <i class="unlock alternate icon"></i> -->
                Login
              </button>
              <button class="ui inverted secondary button" type="submit" >
                <a href="login1.html" style="color:white">Sign up</a>
              </button>
        </div>
        </a>

        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>