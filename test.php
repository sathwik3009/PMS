<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
    <title>Document</title>
    <style>
        body{
            background-color: #37414b;
            background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
        }
      .bar{
        margin:auto;
        width:575px;
        border-radius:30px;
        border:1px solid #dcdcdc;
      }
      .bar:hover{
        box-shadow: 1px 1px 8px 1px #dcdcdc;
      }
      .bar:focus-within{
        box-shadow: 1px 1px 8px 1px #dcdcdc;
        outline:none;
      }
      .searchbar{
        height:45px;
        border:1px solid #dcdcdc;
        width:575px;
        font-size:16px;
        border-radius:30px;
        outline: none;
      }
</style>
</head>
<body>
    <div class="ui secondary menu navbar" style="padding:3px; background-color:white;">

        <a class="ui item">
        <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
        <div class="right menu">
            <a href="/" class="ui item">
            <h2>Logout</h2>
            </a>
        </div>
    </div>
    <div class="ui huge header" style="text-align:center;color:white;">Welcome </div>
    <center>
      <form action="" method="post">
    <div class="bar">
      <div class="ui search">
  <div class="ui icon input searchbar">
    <input class="prompt" type="text" name="id" placeholder="Search Medkart...">
    <i class="search icon"></i>
  </div>
</div>
    </div>
    <button class="ui secondary button" type="submit" name="search">
        Search Data
      </button>
  </center>
</form>
  <?php
  $Connection = mysqli_connect("localhost:3307","root","");
  $db=mysqli_select_db($Connection,"pmsdb");

  if(isset($_POST['search']))
  {
    $id=$_POST['id'];

    $query="SELECT Buyer_ID,Buyer_Name,Buyer_Email,Buyer_Address,Buyer_Contact FROM buyer WHERE Buyer_Name='$id' ";
    $query_run=mysqli_query($Connection,$query);

    while($row=mysqli_fetch_array($query_run))
    {
      ?>
      <form action="" method="POST">
        <input type="hidden" name="Buyer_Name" value="<?php echo $row['Buyer_Name']  ?>" />
        <input type="text" name="Buyer_ID"  value="<?php echo $row['Buyer_ID']  ?>" />
        <input type="text" name="Buyer_Email"  value="<?php echo $row['Buyer_Email']  ?>"/>
        <input type="text" name="Buyer_Contact" value="<?php echo $row['Buyer_Contact']  ?>"/>
        <input type="text" name="Buyer_Address" value="<?php echo $row['Buyer_Address']  ?>"/>
      </form>

      <?php
    }
  }
  ?>
</body>
</html>
