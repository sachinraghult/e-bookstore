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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/profile1.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">

    <style>
        body{
        background-image: url(images/11.gif);
        background-size: cover;
    }
    </style>
</head>
<body>

<?php include("includes/header.php");?>

<div class="patterns">
  <svg width="100%" height="50%">         
    <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"> </rect>
 <text x="50%" y="60%"  text-anchor="middle"  >
   User Profile Card
 </text>
 </svg>
</div>

<script>
document.querySelectorAll('.button').forEach(button => button.innerHTML = '<div><span>' + button.textContent.trim().split('').join('</span><span>') + '</span></div>');
</script>

<?php
  $sql = "SELECT * from customer where customer.cus_id={$_SESSION["CUS_ID"]}";
  $res = $db->query($sql);
  $row = $res->fetch_assoc();
  echo"
  <div class='box' style='margin-left:35%;margin-top:0%'>
    <div class='card'>
    <div class='imgBx'>
      <img src='{$row['cus_image']}' alt='profile' style='width:100%'></div>
      <div class='details'><b>
      <h2>{$row['cus_name']}</h2>
      <h2><span>{$row['cus_mail']}<br><br>
      <a href='cust_transaction.php' class='rainbow rainbow-1' style='border-radius:30px;text-decoration:none'>View Transactions</a></span></h2>
    </div></div></div>";
?>

</body>


</html>
