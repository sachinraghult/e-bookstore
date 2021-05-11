<?php
  session_start();
  include("../db.php");
  if(!isset($_SESSION["AID"])){
    header("location:../admin_login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <link rel="stylesheet" type="text/css" href="../css/cards.css">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
</head>
<body>

<?php 
    include("header.php");
?>



</body>
</html>