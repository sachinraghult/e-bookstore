<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body{
            background-image: url(images/library.jpg);
        }
    </style>
</head>
<body>

<?php include("header.php");?>

<h2 style="text-align:center; margin-top:200px">User Profile Card</h2>

<div class="card">
  <img src="/w3images/team2.jpg" alt="John" style="width:100%">
  <h1>John Doe</h1>
  <p>johndoe@gmail.com</p>
  <p><button onclick="location.href='userpwd.php'" style="margin-bottom: 0%;">Change Password</button></p>
</div>

</body>
</html>
