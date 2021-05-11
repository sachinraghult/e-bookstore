<!DOCTYPE html>
<html>
<?php
  session_start();
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-Book Store</title>
    <link rel="stylesheet" type="text/css" href="css/cards.css">
    <style>
        body{
        background-image: url(images/library.gif);
        background-repeat: no-repeat;
        background-size: cover;
        }
    </style>
</head>
<body style="size: 16px">

<?php 
    if(isset($_SESSION['CUS_ID']))
    {
        include("includes/header.php");
    }
    else
    {
        include("includes/main_header.php");
    }

    if(!isset($_SESSION["CUS_ID"])){
        echo'<br><h1>&ensp;Welcome</h1>';
    }
    else{
      echo"<br><h1 style='text-align: center'>&ensp;Welcome {$_SESSION['CUS_NAME']}</h1>";
    }

    $sql="SELECT * FROM CATEGORY;";
    $res=$db->query($sql);

    echo'<div class="wrapper">
    <div class="cards_wrap">';

    while($rows=$res->fetch_assoc())
    {
      echo"
          <div class='card_item'>
          <div class='card_inner'>
            <a style='text-decoration: none' href='books.php?id={$rows['cat_id']}'>
              <div class='card_bottom'>
              <div class='card_info'>
                  <p class='title' style='text-align: center'>{$rows['cat_name']}</p>
              </div>
              </div>
            </a>
          </div>
          </div>
      ";
    }
    ?>

<?php include("includes/footer.php"); ?>