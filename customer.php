<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "pms";



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
	$firstName = $_POST['customerName'];
	$address = $_POST['customerAddress'];
	$email = $_POST['customerEmail'];
	$password = $_POST['customerPassword'];
	$contact = $_POST['customerContact'];
    $id = mt_rand(0,1000000);

    $query ="SELECT * FROM customer WHERE Customer_Email= '$email'";
    $result = mysqli_query($conn,$query);
    $count  = mysqli_num_rows($result);
    if($count==0) {
      $sql = "INSERT INTO customer(Customer_Name,Customer_Password,Customer_Email,Customer_Contact,Customer_Address,Customer_ID)
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