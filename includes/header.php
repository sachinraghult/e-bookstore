<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    @import url("https://fonts.googleapis.com/css?family=Nunito&display=swap");
    *{
      font-family: "Nunito", sans-serif;
    }
    body{
      background: #eedfcc;
      color: #555555;
      font-size: 16px;
      line-height: 1.42em;
    }
    .main{
      width: 10%;
      height: 100%;
      float: left;
      position: fixed;
    }
    .header{
      position: fixed; 
      margin-left: 6.6%;
      top: 0; 
      overflow: hidden; 
      z-index: 999; 
      padding:16px; 
      background-color: #ff6600; 
      color: white;
      text-align: center; 
      width: 93.4%;
      float: right;
    }
    .material-icons.md-48 { font-size: 48px; }
    .material-icons.md-light { color: rgba(255, 255, 255, 1); }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  

</head>
<body style="size: 18px">

<div class="main">
<nav>
  <ul style="margin-top: 0%; padding: 0; list-style-type: none;">

    <li>
    <span class="material-icons md-48 md-light">home</span>
    </li>

    <li>
    <span class="material-icons md-48 md-light">search</span>
    </li>
    
    <li>
    <span class="material-icons md-48 md-light">shopping_cart</span>
    </li>

    <li>
    <span class="material-icons md-48 md-light">recommend</span>
    </li>

    <li>
    <span class="material-icons md-48 md-light">account_box</span>
    </li>

    <li>
    <span class="material-icons md-48 md-light">lock</span>
    </li>

    <li>
    <span class="material-icons md-48 md-light">logout</span>
    </li>
  </ul>
  </nav>
</div>

<div class="header"><b style="margin-left: 11%; font-size: 25px; line-height: 25px;">E-BOOKSTORE</b></div>

<div style="margin-top: 0%; margin-bottom: 0%; margin-left: 150px">

<style>
  *,*:before,*:after {
	box-sizing: border-box;
  }

  :after {
    content: "";
  }

  h1 { 
    margin:80px 0 10px 0;
    font-size: 52px;
    font-family: 'Montserrat', sans-serif;
    text-transform: uppercase;
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
    top: 0;
    left: 0;
    background: transparent;
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
    opacity:.5;
    transform: perspective(400px) rotateY(90deg);
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
    content: "Request";
    line-height: 70px;
  }
  nav ul li:nth-child(5):after { 
    content: "Profile";
    line-height: 70px;
  }
  nav ul li:nth-child(6):after { 
    content: "Change Password";
    line-height: 35px;
  }
  nav ul li:nth-child(7):after { 
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
    display: inline-block;
    padding: 25px 0;
    background: transparent;
  }

  nav ul li div { position: relative; }

  .roof {
    width: 0;
    height: 0;
    top:2px;
    border-style: solid;
    border-width: 0 21px 15px 21px;
    border-color: transparent transparent #ffffff transparent;
  }

  .roof-edge {
    position: absolute;
    z-index: 20;
    left: -17px;
    top: 3px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 17px 12px 17px;
    border-color: transparent transparent crimson transparent;
  }
  /*white triangle over red triangle*/
  .roof-edge:after {
    position: absolute;
    left: -14.5px;
    top: 3px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 14.5px 10px 14.5px;
    border-color: transparent transparent white transparent;
  }

  .front {
    position: relative;
    top: 3px;
    width: 28.5px;
    height: 20px;
    margin: 0 auto;
    background: white;
  }
  /*door*/
  .front:after {
    position: absolute;
    background: crimson;
    width: 11px;
    height: 13px;
    bottom: 0;
    left:9px;
  }

  /*/// About me ////*/

  .head {
    width: 32px;
    height: 35px;
    background: white;
    border-radius:8px;
  }
  /*mouth*/
  .head:after {
    width: 4px;
    height: 10px;
    background: white;
    position: absolute;
    border-radius:4px 0 0 4px;
    top:21px;
    left: 14px;
    transform:rotate(270deg);
  }

  .eyes {
    width: 8px;
    height: 5px;
    border-radius: 50%;
    position: absolute;
    top: 10px;
    left: 5px;
    background: crimson;
  }
  /*right eye*/
  .eyes:after {
    width: 8px;
    height: 5px;
    border-radius: 50%;
    position: absolute;
    top: 0;
    left: 14px;
    background: crimson;
  }

  .beard {
    width: 32px;
    height: 17px;
    background: crimson;
    border:2px solid white;
    position: absolute;
    bottom: 0;
    left: 0;
    border-radius:0 0 8px 8px;
  }
  /*nose*/
  .beard:after {
    position: absolute;
    top:-2px;
    left: 11px;
    background: white;
    width:6px;
    height: 4px;
    border-left:1px solid crimson;
    border-right:1px solid crimson;
  }

  /*//work//*/

  .paper {
    position: relative;
    height:32px;
    width: 29px;
    background: white;
    border:2px solid white;
  }

  /*window*/
  .paper:after {
    position: absolute;
    top:1px;
    left: 0;
    width: 25px;
    height: 29px;
    background: white;
    border-top:4px solid crimson;
  }

  .lines {
    position: absolute;
    top: 36px;
    left: 5px;
    width: 11px;
    box-shadow: 0 0 0 1px crimson;
  }

  .lines:after {
    position: absolute;
    top: 4px;
    left: 3px;
    width: 14px;
    box-shadow: 0 0 0 1px crimson;
  }

  .lines:nth-child(2) {
    position: absolute;
    top: 44px;
    left: 8px;
    width: 11px;
  }

  .lines:nth-child(2):after {
    position: absolute;
    top: 4px;
    left: -3px;
    width: 11px;
  }

  .lines:nth-child(3) {
    position: absolute;
    top: 52px;
    left: 8px;
    width: 14px;
  }

  .lines:nth-child(3):after {
    display: none;
  }

  /*//mail //*/

  .mail-base {
    position: relative;
    width: 32px;
    height: 18px;
    background: white;
  }

  .mail-top {
    position: absolute;
    z-index: 20;
    left: 0;
    top: 0;
    width: 0;
    height: 0;
    transform: rotate(180deg);
    border-style: solid;
    border-width: 0 16px 11px 16px;
    border-color: transparent transparent crimson transparent;
  }

  .mail-top:after {
    position: absolute;
    z-index: 20;
    left: -16px;
    top: 3px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 16px 9px 16px;
    border-color: transparent transparent white transparent;
  }

</style>