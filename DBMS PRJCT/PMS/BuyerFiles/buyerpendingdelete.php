<?php
session_start();
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "pms";
$sono = $_GET['SONO'];

 $conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "DELETE FROM temp_sale_order WHERE SONO='$sono'";
      if ($conn->query($sql) === TRUE) {
          readfile('buyertempdel.php');
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
//  echo "<p>".$sid." ".$sname." ".$mname." ".$mq." ".$amt." ".$pono." ".$pay_mode." ".$buy_date."</p>";
?>