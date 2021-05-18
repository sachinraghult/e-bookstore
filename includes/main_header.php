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
<b><div class='console-container'><span id='text'></span><div class='console-underscore' id='console'>&#95;</div></div></b>
</div>

<div class="sidebar">
<nav class="navi">
  <ul style="margin-top: 0%; padding: 0; list-style-type: none;">

    <li onclick="location.replace('index.php')"><span class="material-icons md-48 md-light">home</span></li>

    <li onclick="location.replace('search_books.php')"><span class="material-icons md-48 md-light">search</span></li>

    <li onclick="location.replace('login.php')"><span class="material-icons md-48 md-light">login</span></li>
    
    <li onclick="location.replace('register.php')"><span class="material-icons md-48 md-light">how_to_reg</span></li>

    <li onclick="location.replace('admin_login.php')"><span class="material-icons md-48 md-light">admin_panel_settings</span></li>

  </ul>
</nav>
</div>

<div class="within">
<br><br><br>

<style>
  @media screen and (max-width: 525px) {
    .sidebar {
      width: 100%;
      height: auto;
      position: fixed;
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
      position: fixed;
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

  @import url(https://fonts.googleapis.com/css?family=Khula:700);
    .hidden {
      opacity:0;
    }
    .console-container {
      
      font-family:sans-serif;
      font-size:1.5em;
      text-align:center;
      display:block;
      position:relative;
      color:white;
      top:0;
      bottom:0;
      left:0;
      right:0;
      margin:auto;
    }
    .console-underscore {
      display:inline-block;
      position:relative;
      top:-0.14em;
      left:10px;
    }
  </style>

  <script>
      const wrapper = document.querySelectorAll(".cardWrap");

      wrapper.forEach(element => {
      let state = {
          mouseX: 0,
          mouseY: 0,
          height: element.clientHeight,
          width: element.clientWidth
      };

      element.addEventListener("mousemove", ele => {
          const card = element.querySelector(".card");
          const cardBg = card.querySelector(".cardBg");
          state.mouseX = ele.pageX - element.offsetLeft - state.width / 2;
          state.mouseY = ele.pageY - element.offsetTop - state.height / 2;

          // parallax angle in card
          const angleX = (state.mouseX / state.width) * 30;
          const angleY = (state.mouseY / state.height) * -30;
          card.style.transform = `rotateY(${angleX}deg) rotateX(${angleY}deg) `;

          // parallax position of background in card
          const posX = (state.mouseX / state.width) * -40;
          const posY = (state.mouseY / state.height) * -40;
          cardBg.style.transform = `translateX(${posX}px) translateY(${posY}px)`;
      });

      element.addEventListener("mouseout", () => {
          const card = element.querySelector(".card");
          const cardBg = card.querySelector(".cardBg");
          card.style.transform = `rotateY(0deg) rotateX(0deg) `;
          cardBg.style.transform = `translateX(0px) translateY(0px)`;
      });
      });


      // function([string1, string2],target id,[color1,color2])    
    consoleText(['E-BOOKSTORE.', 'E-BOOKSTORE.', 'E-BOOKSTORE.'], 'text',['#FF9933','#FFFFFF','#138808','#000080']);

    function consoleText(words, id, colors) {
      if (colors === undefined) colors = ['#fff'];
      var visible = true;
      var con = document.getElementById('console');
      var letterCount = 1;
      var x = 1;
      var waiting = false;
      var target = document.getElementById(id)
      target.setAttribute('style', 'color:' + colors[0])
      window.setInterval(function() {

        if (letterCount === 0 && waiting === false) {
          waiting = true;
          target.innerHTML = words[0].substring(0, letterCount)
          window.setTimeout(function() {
            var usedColor = colors.shift();
            colors.push(usedColor);
            var usedWord = words.shift();
            words.push(usedWord);
            x = 1;
            target.setAttribute('style', 'color:' + colors[0])
            letterCount += x;
            waiting = false;
          }, 1000)
        } else if (letterCount === words[0].length + 1 && waiting === false) {
          waiting = true;
          window.setTimeout(function() {
            x = -1;
            letterCount += x;
            waiting = false;
          }, 1000)
        } else if (waiting === false) {
          target.innerHTML = words[0].substring(0, letterCount)
          letterCount += x;
        }
      }, 120)
      window.setInterval(function() {
        if (visible === true) {
          con.className = 'console-underscore hidden'
          visible = false;

        } else {
          con.className = 'console-underscore'

          visible = true;
        }
      }, 400)
    }
  </script>