<?php
session_start();
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "pms";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$id2=$_SESSION['user_id'];
$query="SELECT * FROM buyer WHERE Buyer_ID='$id2'";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
$contact = $row['Buyer_Contact'];
$address = $row['Buyer_Address'];
$bname= $row['Buyer_Name'];
}
$sono=$_GET['SONO'];
$mname=$_GET['MName'];
$mquantity=$_GET['MQ'];
$saledate=$_GET['date'];
$paymode=$_GET['PAYMODE'];
$days=$_GET['DAYS'];
$amt=$_GET['AMT'];

?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>Buyer</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <meta name="viewport" content="width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
    <style>
		.field{
		padding:10px;
		}
		.cont{
		display:flex;
		justify-content:space-around;
		/* margin:5;
		padding:5; */
		}
		.left_bill{
		text-align:left;
		flex:1;
		}
		.right_bill{
		text-align:right;
		flex:1;
		}
		.ui.fluid.card{
		margin:2%;
		padding:1%;
		width:70%;
		}
		.ui.fluid.button{
		margin:2%;
		margin-left:auto;
		margin-right:auto;
		width: 30% !important;;
		}
		th,td{
		max-width:80px;
		padding: 2% 4%;
		}

		.table {
			border-collapse: collapse;
			font-size: 0.9em;
			font-family: sans-serif;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
			margin:5%;
		}

		.table thead tr {
			background-color: #37414b;
			color: #ffffff;
			text-align: center;
		}

		.table th,
		.table td {
			padding: 2% 4%;
		}
		.table tr {
			border-bottom: 1px solid #dddddd;
		}

		.table tr:last-of-type {
			border-bottom: 2px solid #37414b;
		}

		.sell_head{
		text-align:center!important;
		color:white;
		font-family:'sans-serif';
		font-weight:700;
		margin:3%;
		}

		.tax{
		width:50%;
		align-self:flex-end;
		margin:1%;
		margin-bottom:3%;
		}
		body{
			background-color: #37414b;
			background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
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
			<a href="logout.php" class="ui item">
			<h4>Logout</h4>
			</a>
		  </div>
		  </div>
		  <div class="ui centered grid container">
  		  <div class="ui fluid card" id="bill">
			<div class="cont">
			<div class="left_bill">
				<h2><i style="margin-bottom:11%; margin-top:2%;" class="shopping cart icon" size="big"></i>MedKart</h2>
				<p><b>Seller Name : </b>MedKart Pvt Ltd</p>
				<p><b>Seller Contact : </b>0000000000</p>
				<p><b>Seller Address : </b>Anna Nagar,Chennai</p>
			</div>
			<div class="right_bill">
				<div style="margin-bottom:7%; margin-top:2%;">
					<p><b>Invoice No : </b><?php echo "$sono"; ?></p>
					<p><b>Created Date : </b><?php echo "$saledate"; ?></p>
				</div>
				<p><b>Buyer Name : </b><?php echo "$bname"?></p>
				<p><b>Buyer Contact : </b><?php echo "$contact"?></p>
				<p><b>Buyer Address : </b><?php echo "$address"?></p>
			</div>
			</div>
			<table class="table">
			<tr>
				<th>Medicine Name</th>
				<th>Quantity</th>
				<th>PayMode</th>
				<th>Amount</th>
			</tr>
			<tr>
				<td><?php echo "$mname" ?></td>
				<td><?php echo "$mquantity"?></td>
				<td><?php echo "$paymode" ?></td>
				<td><?php echo "$amt" ?> Rs</td>
			</tr>
			</table>
		 </div>
		</div>
	<button class="ui fluid button btn button" onclick="generatePDF()">Download</button>
<script>
  function generatePDF(){
    const element =document.getElementById("bill");

    html2pdf()
    .from(element)
    .save();
  }
</script>
</body>
</html>
