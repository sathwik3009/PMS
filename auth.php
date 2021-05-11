<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "pms";


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
    if($email== $adminEmail && $password==$adminPassword)
        readfile("admin.html");
    else
        readfile("error.html");
}
else{
    $em = $tableName."_Email";
    $ps = $tableName."_Password";
    $tb = strtolower($tableName);
    $query ="SELECT * FROM  $tb WHERE $em= '$email' AND $ps='$password'";
    $result = mysqli_query($conn,$query);
	$count  = mysqli_num_rows($result);
	if($count==0) {
		echo "Invalid Username or Password!";
	} else {
		if($tableName == "Buyer"){
            readfile("buyer.html");
        }
        else{
            readfile("customer.html");
        }
	}
}
?>