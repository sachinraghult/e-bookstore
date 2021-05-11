<?php
  session_start();
  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }
  include("db.php");
?>


<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body{
        background-image: url(images/library.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body>

<?php include("includes/header.php");?>

<h2 style="text-align:center; margin-top:200px">User Profile Card</h2>

<?php
  $sql = "SELECT * from customer where customer.cus_id={$_SESSION["CUS_ID"]}";
  $res = $db->query($sql);
  $row = $res->fetch_assoc();
  echo"
    <div class='card'>
      <img src='{$row['cus_image']}' alt='profile' style='width:100%'>
      <h1>{$row['cus_name']}</h1>
      <p>{$row['cus_mail']}</p>
      <p><a href='cust_transaction.php'><button style='margin-bottom: 0%;'>View Transactions</button></a></p>
    </div>";
?>

</body>
</html>
