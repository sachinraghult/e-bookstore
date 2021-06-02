<?php
    include("db.php");
    $cart=$db->query("SELECT count(*) from cart where cart.cus_id = {$_SESSION['CUS_ID']};");
    $cartres=$cart->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    @import url("https://fonts.googleapis.com/css?family=Nunito&display=swap");
    
    *{
      font-family: "Nunito", sans-serif;
    }
    .header{
      margin-left: 0%;
      margin-top: 0%; 
      position: fixed; 
      overflow: hidden; 
      z-index: 999; 
      width: 100%;
      height: 70px;
      padding:16px; 
      color: white;
      background-color: crimson; 
      text-align: center; 
    }
    .sidebar{
      margin: 0;
      padding: 0;
      width: 100px;
      height: 100%;
      float: left;
      position: fixed;
      margin-top: 69px;
      background-color: crimson;
    }
    .sidebar li {
      display: block;
      text-decoration: none;
    }
    .within{
      margin-top: 0%; 
      margin-bottom: 0%; 
      margin-left: 10%;
    }
    
    .material-icons.md-48 { font-size: 48px; }
    .material-icons.md-light { color: rgba(255, 255, 255, 1); }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  
</head>
<body>

<div class="header">
  <div class="shimmer">
  <b style="font-size: 30px; line-height: 30px;"><span class="material-icons">sailing</span>&ensp;PAPER BOAT</b>
  </div>
</div>

<div class="sidebar">
<nav class="navi">
  <ul style="margin-top: 0%; padding: 0; list-style-type: none;">

    <li id="home" onclick="location.replace('index.php')"><span class="material-icons md-48 md-light">home</span></li>

    <li id="search" onclick="location.replace('search_books.php')"><span class="material-icons md-48 md-light">search</span></li>
    
    <li id="store" onclick="location.replace('book_purchased.php')"><span class="material-icons md-48 md-light">local_library</span></li>
    
    <li id="cart" onclick="location.replace('cart.php')"><span class="material-icons md-48 md-light" id="cart">shopping_cart
    
    <?php 
        if($cartres['count(*)'])
            echo "<div class='cart_badge'>{$cartres['count(*)']}</div>";
    ?>
    </span></li>

    <li id="request" onclick="location.replace('cust_request.php')"><span class="material-icons md-48 md-light">recommend</span></li>

    <li id="transaction" onclick="location.replace('cust_transaction.php')"><span class="material-icons md-48 md-light">paid</span></li>

    <li id="profile" onclick="location.replace('profile.php')"><span class="material-icons md-48 md-light">account_box</span></li>

    <li id="pwd" onclick="location.replace('cust_pwd.php')"><span class="material-icons md-48 md-light">lock</span></li>

    <li onclick="location.replace('logout.php')"><span class="material-icons md-48 md-light">logout</span></li>


  </ul>
</nav>
</div>

<div class="within">
<br><br><br>

<style>

  /* Define what each icon button should look like */
  #cart {
      color: white;
      display: inline-block; /* Inline elements with width and height. TL;DR they make the icon buttons stack from left-to-right instead of top-to-bottom */
      position: relative; /* All 'absolute'ly positioned elements are relative to this one */
      padding: 2px 5px; /* Add some padding so it looks nice */
      }

      /* Make the badge float in the top right corner of the button */
      .cart_badge {
      background-color: #5499C7;
      border-radius: 10px;
      color: white;
      
      padding: 1px 3px;
      font-size: 15px;
      
      position: absolute; /* Position the badge within the relatively positioned button */
      top: 0;
      right: 0;
  }
  @media screen and (max-width: 720px) {
    .sidebar {
      width: 100%;
      height: auto;
      position: relative;
    }
    .sidebar li {
      float: left;
    }
    div.inner {
      margin-left: 0;
    }
  }

  @media screen and (max-height: 580px) {
    .sidebar {
      width: 100%;
      height: auto;
      position: relative;
    }
    .sidebar li {
      float: left;
    }
    div.inner {
      margin-left: 0;
    }
  }

  @media screen and (max-width: 400px) {
  .sidebar li {
    margin-left: 125%;
    text-align: center;
    float: none;
  }
  }

  :after {
    content: "";
  }

  h1 { 
    margin:80px 0 10px 0;
    font-size: 52px;
    font-family: 'Montserrat', sans-serif;
    text-transform: uppercase;
    line-height: 60px;
    text-shadow: 1px 1px 0px #DC143C,
    2px 2px 0px #DC143C,
    3px 3px 0px #DC143C,
    4px 4px 0px #DC143C;
  }

  h2 {
    font-size: 24px;
  }

  nav {
    float: left;
    margin-left: 0%;
    position: relative;
    background: transparent;
    height: 100%
  }

  nav ul {
    text-align: center;
  }

  nav ul li {
    position: relative;
    width: 100px;
    
    padding: 10px;
    cursor: pointer;
    background: crimson;
    text-transform: uppercase;
    transition:all .4s ease-out;
  }

  nav ul li:after {
    position: absolute;
    background: white;
    color: crimson;
    top:0;
    left: 70px;
    width: 100px; height: 100%;
    opacity: 0.0;
    transform: perspective(400px) rotateX(90deg);
    transform-origin: 0 100%;
    transition:all .4s ease-out;
  }

  nav ul li:nth-child(1):after { 
    content: "Home";
    line-height: 88px;
  }
  nav ul li:nth-child(2):after { 
    content: "Search";
    line-height: 88px;
  }
  nav ul li:nth-child(3):after { 
    content: "Store";
    line-height: 85px;
  }
  nav ul li:nth-child(4):after { 
    content: "Cart";
    line-height: 70px;
  }
  nav ul li:nth-child(5):after { 
    content: "Request";
    line-height: 70px;
  }
  nav ul li:nth-child(6):after { 
    content: "Transactions";
    line-height: 70px;
    font-size: 12px;
  }
  nav ul li:nth-child(7):after { 
    content: "Profile";
    line-height: 70px;
  }
  nav ul li:nth-child(8):after { 
    content: "Change Password";
    line-height: 35px;
  }
  nav ul li:nth-child(9):after { 
    content: "Logout";
    line-height: 70px;
  }

  nav ul li:hover {
    transform: translateX(-70px);
  }

  nav ul li:hover:after {
    opacity: 1;
    transform: perspective(400px) rotateY(0deg) scale(1) ;
  }


  nav ul li > div {
    display: block;
    padding: 25px 0;
    background: transparent;
  }

  nav ul li div { position: relative; }


.shimmer {
  font-family: lato;
  color: rgba(105,105,105,0.6);
  background: -webkit-gradient(linear, left top, right top, from(#222), to(#222), color-stop(0.5, #fff));
  background: -moz-gradient(linear, left top, right top, from(#222), to(#222), color-stop(0.5, #fff));
  background: gradient(linear, left top, right top, from(#222), to(#222), color-stop(0.5, #fff));
  background-size: 125px 100%;
  -webkit-background-clip: text;
  -moz-background-clip: text;
  background-clip: text;
  animation-name: shimmer;
  animation-duration: 5s;
  animation-iteration-count: infinite;
  background-repeat: no-repeat;
  background-color: #222;
}

@keyframes shimmer {
  0% {
    background-position: calc(0% - 125px) 0%;
  }
  100% {
    background-position: calc(100% + 125px) 0%;
  }
}

</style>