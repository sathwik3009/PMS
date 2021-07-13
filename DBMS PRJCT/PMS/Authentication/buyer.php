<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "pms";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  
	$firstName = $_POST['buyerName'];
	$address = $_POST['buyerAddress'];
	$email = $_POST['buyerEmail'];
	$password = $_POST['buyerPassword'];
	$contact = $_POST['buyerContact'];
    $id = mt_rand(0,1000000);

    $query ="SELECT * FROM buyer WHERE Buyer_Email= '$email'";
    $result = mysqli_query($conn,$query);
    $count  = mysqli_num_rows($result);
    if($count==0) {
    $sql = "INSERT INTO buyer(Buyer_Name,Buyer_Password,Buyer_Email,Buyer_Contact,Buyer_Address,Buyer_ID)
    VALUES ('$firstName', '$password', '$email','$contact','$address','$id')";
    if ($conn->query($sql) === TRUE) {
      readfile('sucess.html');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  else{
      header("location:./error.html");
  }
    
    $conn->close();
    ?>