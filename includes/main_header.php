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
      margin-left: 10%
    }
    
    .material-icons.md-48 { font-size: 48px; }
    .material-icons.md-light { color: rgba(255, 255, 255, 1); }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/cat_card.css">
  <link rel="stylesheet" type="text/css" href="css/font.scss">
  
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

    <li id="login" onclick="location.replace('login.php')"><span class="material-icons md-48 md-light">login</span></li>
    
    <li id="register" onclick="location.replace('register.php')"><span class="material-icons md-48 md-light">how_to_reg</span></li>

    <li id="admin" onclick="location.replace('admin_login.php')"><span class="material-icons md-48 md-light">admin_panel_settings</span></li>

  </ul>
</nav>
</div>

<div class="within">
<br><br>

<style>
  @media screen and (max-width: 525px) {
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

  @media screen and (max-height: 425px) {
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
    content: "Login";
    line-height: 85px;
  }
  nav ul li:nth-child(4):after { 
    content: "Register";
    line-height: 70px;
  }
  nav ul li:nth-child(5):after { 
    content: "Admin";
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
  background-size: 200px 100%;
  -webkit-background-clip: text;
  -moz-background-clip: text;
  background-clip: text;
  animation-name: shimmer;
  animation-duration: 10s;
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