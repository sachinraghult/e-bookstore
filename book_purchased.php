<?php
  session_start();
  include("db.php");
  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }
  include("includes/header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>In Your Store</title>
    <link rel="stylesheet" type="text/css" href="css/font.scss">
    <link rel="stylesheet" type="text/css" href="css/font1.scss">
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="css/book_pur_cards.css">
</head>
<body>

<?php
    if (isset($_SESSION["CUS_ID"])) 
    {
        $sql2="SELECT book.*,category.cat_name from book inner join payments on payments.bid=book.bid and payments.cus_id={$_SESSION['CUS_ID']}
        inner join category on category.cat_id = book.cat_id
        ORDER by payments.bill_id DESC";


        $res2=$db->query($sql2);

        echo"<br><b><div class='console-container'><span id='text'></span><div class='console-underscore' id='console'>&#95;</div></div></b>";
        
        if($res2->num_rows>0)
        { 
            echo " 
            <div class='container1'>
            ";
            while($rows2=$res2->fetch_assoc())
            {
                $img = "admin/{$rows2['bimage']}";
                echo"
                <a href='cust_book_det.php?id={$rows2['bid']}'><div class='cardWrap'>
                  <div class='card'>
                    <div class='cardBg' style='background-image: url({$img});'></div>
                    <div class='cardInfo' style='width:100%'>
                      <h3 class='cardTitle'>
                        {$rows2['bname']}
                      </h3>
                      <p>
                        {$rows2['author']}
                        <br>
                        {$rows2['cat_name']}
                      </p>
                    </div>
                  </div>
                </div>
                </a>
            ";
            }
            echo "</div>";
        }
        else
        {
            echo "<p style='color: red; background-color: white; font-size: large; width: 310px'>Sorry, you did'nt purchase any book  :(</p>";
        }
    }
?>

    </div>

    <style>
      @import url(https://fonts.googleapis.com/css?family=Khula:700);
      .hidden {
        opacity:0;
      }
      .console-container {
        
        font-family:sans-serif;
        font-size:2.5em;
        text-align:left;
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
      consoleText(['In Your Store..', 'In Your Store..', 'In Your Store..'], 'text',['rgb(255, 0, 102)','rgb(92, 214, 92)','rgb(191, 128, 255)']);

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
    
    <style>
      #store{
        background: #8ae600;
      }

      #store:after{
        color: #8ae600;
      }
    </style>
</div>
</body>
</html>