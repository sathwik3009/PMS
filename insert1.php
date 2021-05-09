<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "pmsdb";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$Name=$_POST['Name'];
$Password=$_POST['Password'];
$Email=$_POST['Email'];
$Address=$_POST['Address'];
$Contact=$_POST['Contact'];

$sql = "INSERT INTO buyer (Buyer_Name,Buyer_Password,Buyer_Email,Buyer_Contact,Buyer_Address)
VALUES ('$Name', '$Password', '$Email','$Contact','$Address')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
