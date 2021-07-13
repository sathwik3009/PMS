<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "pms";



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
	$firstName = $_POST['sellerName'];
	$address = $_POST['sellerAddress'];
	$email = $_POST['sellerEmail'];
	$password = $_POST['sellerPassword'];
	$contact = $_POST['sellerContact'];
  $id = mt_rand(0,1000000);

    $query ="SELECT * FROM seller WHERE Seller_Email= '$email'";
    $result = mysqli_query($conn,$query);
    $count  = mysqli_num_rows($result);
    if($count==0) {
      $sql = "INSERT INTO seller(Seller_Name,Seller_Password,Seller_Email,Seller_Contact,Seller_Address,Seller_ID)
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