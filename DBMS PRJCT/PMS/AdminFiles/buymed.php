<?php
    session_start();
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "pms";
    $err="";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
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
    .field{
        padding:10px;
    }
    html,body{
        background-color: #37414b;
        background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
        min-height:100vh;
        height:fit-content;
    }
    /* body{
      min-height:100vh;
      height:fit-content;
    } */
    .card{
        border-radius: 10px;
    }
    .ui.celled.table{
      margin:3%;
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
      <a href="logout.php" class="ui item">
      <h4>Logout</h4>
      </a>
    </div>
</div>
<div class="page-login main-body" style="margin:40px">
  <div class="ui centered grid container" style="display:flex; flex-direction:column">
  <center>
    <div class="nine wide column" style="width:40%;">
      <div class="ui fluid card">
        <div class="content">
        <?php 
        if(!empty($err)){
            echo '<div class="ui negative message">' . $err . '</div>';
        }        
        ?>
        <form class="ui large form" action="" method="post">
          <h2 class="ui center aligned icon header">
            <i class="circular plus icon"></i>
            Buy Medicine Page
          </h2>
          <div class="field">
            <label>Enter Medicine Name</label>
            <input type="text" name="mn" placeholder="Enter Medicine Name">
          </div>
        <div style="display:flex; justify-content:space-evenly; padding:10px;">
            <button class="ui secondary button" type="submit">
                Search
              </button>
        </div>
        </form>
        </div>
      </div>
    </div>
    </center>
    <?php
       if($_SERVER['REQUEST_METHOD']=='POST') {
        $mname = $_POST['mn'];
        $query = "SELECT * FROM seller_medicines WHERE MName='$mname'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if($count==0){
            $err='Medicine is not available';
        }
        else{
            echo "<h1 style='color:white; margin:10px;'>Seller details having stock of $mname</h1>";
            $sno = 1;
            $buy='Buy';
            echo "
            <table class='ui celled table'>
                <thead>
                <tr>
                    <th>SNO</th>
                    <th>SELLER NAME</th>
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
                <form method='post' action='bill.php?SName=".$row['SName']."&&MName=".$mname."&&SID=".$row['S_ID']."&&MQ=".$row['MQuantity']."&&PPQ=".$row['PPQ']."'>
                    <td>" . $sno . "</td>
                    <td>" . $row['SName'] . "</td>
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
            </table>
           ";
        }
        $conn->close();
        }
        ?>
  </div>
</div>
</body>
</html>