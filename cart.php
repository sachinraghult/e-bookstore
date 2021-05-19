<?php
  ob_start();
  session_start();

  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }

  include("db.php");

  if(isset($_GET['id'])){
    $sql1="DELETE from cart where bid={$_GET['id']} and cus_id={$_SESSION['CUS_ID']}";
    $res1=$db->query($sql1);
    header("location:cart.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="css/book_cards.css">
    <link rel="stylesheet" type="text/css" href="css/book_btn.css">
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
</head>
<body>

<?php 
        include("includes/header.php");

        $sql="SELECT book.* from book inner join cart where cart.bid=book.bid and cart.cus_id={$_SESSION['CUS_ID']};";
        $res=$db->query($sql);
        echo "<br><br><b>
        <div class='console-container'><span id='text2'></span><div class='console-underscore' id='console2'>&#95;</div>
        <div style='float:right; margin-right:10%'>";
        if($res->num_rows>0){
            echo"
            <a href='payment.php'><button class='custom-btn btn2' style='width:220px; height:45px'>
            <span style='font-size:20px; color:black'>Proceed to Checkout</span> 
            </button></a>";
        }
        else{
            echo"
            <a><button class='custom-btn btn2' style='width:220px; height:45px'>
            <span style='font-size:20px; color:black' disabled>Proceed to Checkout</span> 
            </button></a>"; 
        }

        echo"
        </div>
        </div></b>";
        
        if($res->num_rows>0)
        {
            echo "
            <div class='container'>
            ";
                while($rows=$res->fetch_assoc())
                {
                    echo "
                    <div class='card'>
                        <div class='Box'>
                        <img src='admin/{$rows['bimage']}'>
                        </div>
                        <div class='details'>
                        <h2 style='color:#1F2739'>{$rows['bname']}</h2>
                        <p>{$rows['author']}</p>
                        <p>{$rows['keywords']}</p>
                        <p style='float:right; display:inline-block; color:red'>
                            &#8377;{$rows['price']}
                        </p><br><br><br>
                        <a style='float:left' href='cust_book_det.php?id={$rows['bid']}'><button class='custom-btn btn'>View Book</button></a>
                        <a style='float:right' href='cart.php?id={$rows['bid']}'><button type='submit' class='custom-btn btn1'>Remove</button></a>
                        </div>
                    </div>            
                    ";
                }
            echo "
            </div>
            ";
        }
        else
        {
            echo "<p style='color: red; background-color: white; font-size: large; width: 150px'>Your Cart is Empty</p>
            <br>
            <a href='search_books.php#recommendations' style='text-decoration:none; font-size:25px'>See Recommendations</a>";
        }
?>

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
            background-color: red;
            background-image: linear-gradient(315deg, red 0%, tomato 74%);
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
        
        .btn2{
            border: none;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        .btn2:after {
            position: absolute;
            content: " ";
            z-index: -1;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: yellow;
            background-image: linear-gradient(315deg, yellow 0%, orange 74%);
            transition: all 0.3s ease;
        }
        .btn2:hover {
            background: transparent;
            box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
                        -4px -4px 6px 0 rgba(116, 125, 136, .2), 
            inset -4px -4px 6px 0 rgba(255,255,255,.5),
            inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
            color: #fff;
        }
        .btn2:hover:after {
            -webkit-transform: scale(2) rotate(180deg);
            transform: scale(2) rotate(180deg);
            box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
                        -4px -4px 6px 0 rgba(116, 125, 136, .2), 
            inset -4px -4px 6px 0 rgba(255,255,255,.5),
            inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
        }

        </style>

    <script>

        consoleText(['In Your Cart ...', 'In Your Cart ...', 'In Your Cart ...'], 'text2',['rgb(255, 0, 102)','rgb(92, 214, 92)','rgb(191, 128, 255)']);

        function consoleText(words, id, colors) {
        if (colors === undefined) colors = ['#fff'];
        var visible = true;
        var con = document.getElementById('console2');
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
    #cart{
        background: #8ae600;
    }

    #cart:after{
        color: #8ae600;
    }
</style>


