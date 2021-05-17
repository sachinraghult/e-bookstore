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
      padding:16px; 
      color: white;
      background-color: #ff6600; 
      text-align: center; 
    }
    .sidebar{
      margin: 0;
      padding: 0;
      width: 100px;
      height: 100%;
      float: left;
      position: fixed;
      margin-top: 60px;
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
    
    .material-icons.md-40 { font-size: 40px; }
    .material-icons.md-light { color: rgba(255, 255, 255, 1); }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/cat_card.css">
  <link rel="stylesheet" type="text/css" href="../css/font.scss">
  
</head>
<body>

<div class="header">
  <b style="font-size: 30px; line-height: 30px;">E-BOOKSTORE</b>
</div>

<div class="sidebar">
<nav class="navi">
  <ul style="margin-top: 0%; padding: 0; list-style-type: none;">

    <li onclick="location.replace('index.php')"><span class="material-icons md-40 md-light">home</span></li>

    <li onclick="location.replace('cust_det.php')"><span class="material-icons md-40 md-light">supervisor_account</span></li>
    
    <li onclick="location.replace('upload_books.php')"><span class="material-icons md-40 md-light">backup</span></li>

    <li onclick="location.replace('create_cat.php')"><span class="material-icons md-40 md-light">add_chart</span></li>

    <li onclick="location.replace('view_books.php')"><span class="material-icons md-40 md-light">book</span></li>

    <li onclick="location.replace('request.php')"><span class="material-icons md-40 md-light">recommend</span></li>

    <li onclick="location.replace('comment.php')"><span class="material-icons md-40 md-light">question_answer</span></li>

    <li onclick="location.replace('transaction.php')"><span class="material-icons md-40 md-light">paid</span></li>

    <li onclick="location.replace('adminpwd.php')"><span class="material-icons md-40 md-light">lock</span></li>

    <li onclick="location.replace('../logout.php')"><span class="material-icons md-40 md-light">logout</span></li>


  </ul>
</nav>
</div>

<div class="within">
<br><br><br>

<style>
  @media screen and (max-width: 520px) {
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

  @media screen and (max-height: 715px) {
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
    line-height: 70px;
  }
  nav ul li:nth-child(2):after { 
    content: "Customer Details";
    line-height: 35px;
  }
  nav ul li:nth-child(3):after { 
    content: "Upload Books";
    line-height: 35px;
  }
  nav ul li:nth-child(4):after { 
    content: "Create Category";
    line-height: 35px;
  }
  nav ul li:nth-child(5):after { 
    content: "All Books";
    line-height: 70px;
  }
  nav ul li:nth-child(6):after { 
    content: "Requests";
    line-height: 70px;
  }
  nav ul li:nth-child(7):after { 
    content: "Comments";
    line-height: 70px;
  }

  nav ul li:nth-child(8):after { 
    content: "Transactions";
    line-height: 70px;
    font-size: 12px;
  }

  nav ul li:nth-child(9):after { 
    content: "Change Password";
    line-height: 35px;
  }

  nav ul li:nth-child(10):after { 
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

</style>