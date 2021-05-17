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
      <a href="/admin.php" class="ui item">
        <h4>Home</h4>
        </a>
        <a href="buymed.php" class="ui item">
        <h4>Buy Medicines</h4>
        </a>
        <a href="editmed.php" class="ui item">
        <h4>Edit Medicine Stock</h4>
        </a>
        <a href="/" class="ui item">
        <h4>Logout</h4>
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
    <h1 id="heading"></h1>
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

        if($_SERVER['REQUEST_METHOD']=='POST') {
        $mname = $_POST['mn'];
        $query = "SELECT * FROM seller_medicines WHERE MName='$mname'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if($count==0){
            $err='Medicine is not available';
        }
        else{
            echo "<h1 style='color:white; margin:20px;'>Seller details having stock of $mname</h1>";
            $sno = 1;
            echo "
            <table class='ui celled table'>
                <thead>
                <tr>
                    <th>SNO</th>
                    <th>SELLER NAME</th>
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
                    <td>" . $row['SName'] . "</td>
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
        }
        ?>
  </div>
</div>
</body>
</html>