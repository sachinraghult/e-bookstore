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
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <style>
        wrapper{
        background-image: url(images/9.gif);
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

    echo"<div class='box-container'>";
    $i=0;
      
    while($rows=$res->fetch_assoc())
    {
      if($i++%3==0)
      {
        echo "
        </div>
        <div class='box-container'>
        ";
      }

      $img = "https://s25.postimg.cc/frbd9towf/cta-2.png";
      echo"
      <div class='box-item' style='float: left'>
      <div class='flip-box'>
        <div class='flip-box-front text-center' style='background-image: url({$img});'>
          <div class='inner color-white'>
            <h3 class='flip-box-header'>{$rows['cat_name']}</h3>
            <img src='https://s25.postimg.cc/65hsttv9b/cta-arrow.png' alt='' class='flip-box-img'>
          </div>
        </div>
        <div class='flip-box-back text-center' style='background-image: url({$img});'>
          <div class='inner color-white'>
            <h3 class='flip-box-header'>{$rows['cat_name']}</h3>
            <p>A short sentence describing this callout is.</p>
            <a style='text-decoration: none' href='books.php?id={$rows['cat_id']}'><button class='flip-box-button'>View Books</button></a>
          </div>
        </div>
      </div>
    </div>
      ";
    }
    echo"</div>";
    ?>

<?php include("includes/footer.php"); ?>