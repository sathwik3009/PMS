<?php
session_start();
?>
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
    </style>
</head>
<body>
    <div class="ui secondary menu navbar" style="padding:3px; background-color:white;">
        <a class="ui item">
        <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
        <div class="right menu">
            <a href="admindashboard.php" class="ui item">
            <h4>Home</h4>
            </a>
            <a href="logout.php" class="ui item">
            <h4>Logout</h4>
            </a>
        </div>
    </div>
    <div class="page-login main-body" style="margin:40px;">
        <div class="ui centered grid container">
          <div class="nine wide column">
            <div class="ui fluid card" style="margin-top:15%;">
              <div class="content" style="text-align:center; height:30vh;">
                <h1 style="margin:5%;">Delete Successfull<i class="thumbs up icon"></i></h1>
                <button class="secondary ui button" style="margin:5%;">
                    <a href="admindashboard.php" style="color:white" >Go Back to Home Page</a>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>