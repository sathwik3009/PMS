<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
  <style>
  body{
      background-color: #37414b;
      background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
  }
  </style>
  <body>


    <div class="ui secondary menu navbar" style="padding:3px; background-color:white;">

      <a class="ui item">
      <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
      <div class="right menu">
      <a href="adminhome.php" class="ui item">
          <h4>Home</h4>
          </a>
          <a href="setprice.php" class="ui item">
          <h4>Set Price</h4>
          </a>
          <a href="buymed.php" class="ui item">
          <h4>Buy Medicines</h4>
          </a>
          <a href="editadm.php" class="ui item">
          <h4>Edit Medicine Stock</h4>
          </a>
          <a href="logout.php" class="ui item">
          <h4>Logout</h4>
          </a>
      </div>
  </div>
  <center style="color:white;">
    <h2>Welcome Admin</h2>
    <p>Manage</p>
    <hr style="width:75%">

    <div class="ui three stackable cards" style="width:75%;">

    <div class="ui card" style="height:300px;">

  <div class="content" >
    <div class="center aligned header"><h2>MANAGE USER REQUESTS</h2></div>
    <div class="center aligned description">
      <a href="adminbuyer.php" ><p><i class="massive users icon"></i></p></a>
    </div>
  </div>
  <div class="extra content">
    <div class="center aligned author">
      <i class="large pencil alternate icon"></i>Manage
    </div>
  </div>

</div>

<div class="ui card" style="height:300px;">
  <div class="content">
    <div class="center aligned header"><h2>MANAGE MEDICINE INVENTORY</h2></div>
    <div class="center aligned description">
    <a href="editadm.php"><p><i class="massive plus icon"></i></p></a>
    </div>
  </div>
  <div class="extra content">
    <div class="center aligned author">
    <i class="large pencil alternate icon"></i>Manage
    </div>
  </div>
</div>
<div class="ui card" style="height:300px;">
  <div class="content">
    <div class="center aligned header"><h2>MANAGE PURCHASE REQUESTS</h2></div>
    <div class="center aligned description">
    <a href="buymed.php"> <p><i class="massive edit outline icon"></i></p></a>
    </div>
  </div>
  <div class="extra content">
    <div class="center aligned author">
      <i class="large pencil alternate icon"></i>Manage
    </div>
  </div>
</div>
</div>
<div class="ui card" style="height:300px;">
  <div class="content">
    <div class="center aligned header"><h2>SET PRICE FOR MEDICINES</h2></div>
    <div class="center aligned description">
    <a href="setprice.php"> <p><i class="massive edit outline icon"></i></p></a>
    </div>
  </div>
  <div class="extra content">
    <div class="center aligned author">
      <i class="large pencil alternate icon"></i>Manage
    </div>
  </div>
</div>
</div>
<div>
<div class="ui card" style="height:300px;">
  <div class="content">
    <div class="center aligned header"><h2>SET PRICE FOR MEDICINES</h2></div>
    <div class="center aligned description">
    <a href="setprice.php"> <p><i class="massive edit outline icon"></i></p></a>
    </div>
  </div>
  <div class="extra content">
    <div class="center aligned author">
      <i class="large pencil alternate icon"></i>Manage
    </div>
  </div>
</div>
</div>
</center>
  </body>
