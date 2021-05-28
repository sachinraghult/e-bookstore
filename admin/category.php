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
    <title>Categories</title>
    <link rel="stylesheet" type="text/css" href="../css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="../css/font.scss">
    <link rel="stylesheet" type="text/css" href="../css/book_btn.css">
</head>
<body style="size: 16px">

<?php 
    
    include("header.php");

    echo'
    <div style="float: left; margin-left: 5%; font-size: 50px; color: pink;">
    Manage Categories
    </div>

    <a style="float:right; margin-right: 12%" href="create_cat.php">
    <button class="custom-btn btn1" style="margin-top: 15px; width: 175px; font-size: 20px;"><b>Add Category<b></button>
    </a>
    <br>
    ';

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

      $img1 = "{$rows['cat_image']}";
      $img2 = "{$rows['cat_image1']}";

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
            <a style='text-decoration: none' href='edit_cat.php?id={$rows['cat_id']}'><button class='flip-box-button'>Edit Category</button></a>
          </div>
        </div>
      </div>
    </div>
      ";
    }
    echo"</div>";
?>

<style>
    #category{
        background: #8ae600;
    }

    #category:after{
        color: #8ae600;
    }

    .custom-btn {
        width: 100px;
    }
    .btn1{
        border: none;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    .btn1:after {
        position: absolute;
        content: " ";
        z-index: -1;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #009933;
        background-image: linear-gradient(315deg, #009933 0%, #79ff4d 74%);
        transition: all 0.3s ease;
    }
    .btn1:hover {
        background: transparent;
        box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
                    -4px -4px 6px 0 rgba(116, 125, 136, .2), 
        inset -4px -4px 6px 0 rgba(255,255,255,.5),
        inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
        color: #fff;
    }
    .btn1:hover:after {
        -webkit-transform: scale(2) rotate(180deg);
        transform: scale(2) rotate(180deg);
        box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
                    -4px -4px 6px 0 rgba(116, 125, 136, .2), 
        inset -4px -4px 6px 0 rgba(255,255,255,.5),
        inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
    } 
</style>