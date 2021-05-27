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
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <style>
    body{
      background-image: url("images/profile.gif");
      background-size: cover;
    }
    </style>
</head>
<body>

<?php include("includes/header.php");?>

<div class="patterns" style="margin-right: 10%">
  <svg width="100%" height="50%">         
    <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"> </rect>
 <text x="50%" y="50%" text-anchor="middle">
 <?php echo "{$_SESSION["CUS_NAME"]}"?>
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
  <div class='box' style='margin-left:32%;margin-top:0%'>
    <div class='card'>
    <div class='imgBx'>
      <img src='{$row['cus_image']}' alt='profile' style='width:100%'></div>
      <div class='details'><b>
      <h2>{$row['cus_name']}</h2>
      <h2><span>{$row['cus_mail']}<br><br>
      <a href='edit_profile.php' class='rainbow rainbow-1' style='border-radius:30px;text-decoration:none'>Edit Profile</a></span></h2>
    </div></div></div>";
?>

</body>

<style>
  #profile{
    background: #8ae600;
  }

  #profile:after{
    color: #8ae600;
  }
</style>


