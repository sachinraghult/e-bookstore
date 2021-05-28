<!DOCTYPE html>
<html>
<?php
  session_start();
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Paperboat - Welcome</title>
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
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
        echo'<div class="patterns"  style="margin-right: 10%">
        <svg width="100%" height="50%">         
          <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"> </rect>
       <text x="50%" y="60%"  text-anchor="middle"  >
         Welcome
       </text>
       </svg>
      </div>';
    }
    else{
      echo "<div class='patterns'  style='margin-right: 10%'>
      <svg width='100%' height='50%'>         
        <rect x='0' y='0' width='100%' height='100%' fill='url(#polka-dots)'> </rect>
     <text x='50%' y='60%'  text-anchor='middle'>
       Welcome {$_SESSION["CUS_NAME"]}
     </text>
     </svg>
    </div>";
    }

    $sql="SELECT * FROM category;";
    $res=$db->query($sql);

    echo"<div class='box-container'>";
    $i=0;
      
    while($rows=$res->fetch_assoc())
    {
      if($i++%3==0)
      {
        echo "
        </div>
        <div class='box-container' style='margin-left 10%'>
        ";
      }

      $img1 = "admin/{$rows['cat_image']}";
      $img2 = "admin/{$rows['cat_image1']}";

      echo"
      <div class='box-item' style='float: left;'>
      <div class='flip-box'>
        <div class='flip-box-front text-center' style='background-image: url({$img1});'>
          <div class='inner color-white'>
            <h3 class='flip-box-header'>{$rows['cat_name']}</h3>
            <img src='https://s25.postimg.cc/65hsttv9b/cta-arrow.png' alt='' class='flip-box-img'>
          </div>
        </div>
        <div class='flip-box-back text-center' style='background-image: linear-gradient(rgba(0, 0, 0, 0.200),rgba(0, 0, 0, 0.5)) , url({$img2});'>
          <div class='inner color-white'>
            <h3 class='flip-box-header'>{$rows['cat_name']}</h3>
            <p>{$rows['cat_desc']}</p>
            <a style='text-decoration: none' href='books.php?id={$rows['cat_id']}'><button class='flip-box-button'>View Books</button></a>
          </div>
        </div>
      </div>
    </div>
      ";
    }
    echo"</div>";

    if($res->num_rows == 0)
    {
      echo "<p style='color: red; background-color: white; font-size: large; width: 150px'>No categories found</p>";
    }
    ?>
<style>
  #home{
    background: #8ae600;
  }

  #home:after{
    color: #8ae600;
  }
  
</style>
<?php include("includes/footer.php"); ?>