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
    .field{
        padding:10px;
    }
    html,body{
        background-color: #37414b;
        background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
        min-height:100vh;
        height:fit-content;
    }
    .bar{
      margin:auto;
      width:575px;
      border-radius:30px;
      border:1px solid black;
    }
    .bar:hover{
      box-shadow: 1px 1px 8px 1px black;
    }
    .bar:focus-within{
      box-shadow: 1px 1px 8px 1px black;
      outline:none;
    }
    .searchbar{
      height:45px;
      border:1px solid black;
      width:575px;
      font-size:16px;
      border-radius:30px;
      outline: none;
    }
    .ui.centered.grid.container{
        display:flex;
        flex-direction:column;
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
<div class="page-login main-body" style="margin:40px">
  <div class="ui centered grid container">
  <center>
    <div class="nine wide column">
      <div class="ui fluid card" style="width:60%;">
        <div class="content">
        <?php
        if(!empty($err)){
            echo '<div class="ui negative message">' . $err . '</div>';
        }
        ?>
        <form class="ui large form" action="" method="post">
          <h2 class="ui center aligned icon header">
            <i class="circular plus icon"></i>
            Search Medicine
          </h2>
      <div class="ui search" style="margin:3%">
      <div class="ui icon input searchbar">
        <input class="prompt" type="text" name="mn" placeholder="Search Medkart..." style="border-radius:30px;">
        <i class="search icon"></i>
      </div>
    </div>
        <div style="display:flex; justify-content:space-evenly; padding:10px;">
            <button class="ui secondary button" type="submit" name="search">
                Search
              </button>
        </div>
        </form>
        </div>
      </div>
    </div>
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
if(isset($_POST['search']))
{
  $mname=$_POST['mn'];
$query2 = "SELECT * FROM medicine_inventory WHERE MName='$mname'";
$result = mysqli_query($conn, $query2);
$count = mysqli_num_rows($result);
if($count == 0){
    echo "<h1 style='text-align:center; color:white;'>No Medicine stock currently</h1>";
}
else{
$sno = 1;
echo "
<table class='ui celled table' style='margin-top:3%;'>
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
}
?>
   </center>
  </div>
</div>
</body>
</html>
