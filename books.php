<?php
  session_start();
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Category Books</title>
    <link rel="stylesheet" type="text/css" href="css/book_cards.css">
    <link rel="stylesheet" type="text/css" href="css/book_btn.css">
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
</head>
<body>

<?php 
    if(isset($_SESSION['CUS_ID']))
    {
        include("includes/header.php");
    }
    else
    {
        include("includes/main_header.php");
    }

    if(!isset($_SESSION["CUS_ID"]))
    {
        $sql="SELECT * from book where book.cat_id={$_GET['id']};";
        $res=$db->query($sql);
        echo "<br><br><b><div class='console-container'><span id='text'></span><div class='console-underscore' id='console'>&#95;</div></div></b>";
        
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
                        <a href='login.php'><button class='custom-btn btn'>Pay</button></a>
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
            echo "<p style='color: red; background-color: white; font-size: large; width: 150px'>No Books found  :(</p>";
        }

    }
    else
    {
        $sql1="SELECT * from category where category.cat_id={$_GET["id"]};";
        $res1=$db->query($sql1);
        $rows1=$res1->fetch_assoc();
        echo"
        <div class='patterns' style='margin-right: 10%'>
            <svg width='100%' height='50%'>         
                <rect x='0' y='0' width='100%' height='100%' fill='url(#polka-dots)'> </rect>
            <text x='50%' y='60%'  text-anchor='middle'>
            {$rows1['cat_name']}
            </text>
            </svg>
        </div>
        ";

        $sql2="SELECT book.* from book inner join payments where payments.bid=book.bid and payments.cus_id={$_SESSION['CUS_ID']}
               and book.cat_id={$_GET['id']};";
        $res2=$db->query($sql2);

        echo"<br><b><div class='console-container'><span id='text2'></span><div class='console-underscore' id='console2'>&#95;</div></div></b>";
        
        if($res2->num_rows>0)
        {
            echo "
            <div class='container'>
            ";
            while($rows2=$res2->fetch_assoc())
            {
                echo "
                <div class='card'>
                    <div class='Box'>
                    <img src='admin/{$rows2['bimage']}'>
                    </div>
                    <div class='details'>
                    <h2>{$rows2['bname']}</h2>
                    <p>{$rows2['author']}</p>
                    <p>{$rows2['keywords']}</p>
                    <a href='cust_book_det.php?id={$rows2["bid"]}'><button class='custom-btn btn'>View Book</button></a>
                    </div>
                </div>
                         
                ";
            }
            echo '
            </div>
            ';
        }
        else
        {
            echo "<p style='color: red; background-color: white; font-size: large; width: 350px'>You did'nt purchase any book in {$rows1['cat_name']}  :(</p>";
        }

        $sql3="SELECT * from book where book.cat_id={$_GET["id"]}
               AND book.bid NOT IN
               (SELECT book.bid from book inner join payments where payments.bid=book.bid and payments.cus_id={$_SESSION['CUS_ID']});";
        $res3=$db->query($sql3);

        echo "<br><b><div class='console-container'><span id='text1'></span><div class='console-underscore' id='console1'>&#95;</div></div></b>";
        
        if($res3->num_rows>0)
        {
            echo "
            <div class='container'>
            ";
            while($rows3=$res3->fetch_assoc())
            {
                echo "
                <div class='card'>
                    <div class='Box'>
                    <img src='admin/{$rows3['bimage']}'>
                    </div>
                    <div class='details'>
                    <h2>{$rows3['bname']}</h2>
                    <p>{$rows3['author']}</p>
                    <p>{$rows3['keywords']}</p>
                    <p style='float:right; display:inline-block; color:red'>
                            &#8377;{$rows3['price']}
                    </p><br><br><br>
                    <a href='cust_book_det.php?id={$rows3['bid']}'><button class='custom-btn btn'>View Book</button></a>
                </div>
                </div>            
                ";
            }
            echo '
            </div>
            ';
        }
        else
        {
            echo "<p style='color: red; background-color: white; font-size: large; width: 150px'>No Books found  :(</p>";
        }
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
    </style>

<script>

    consoleText2(['Available books...', 'Available books...', 'Available books...'], 'text',['rgb(255, 0, 102)','rgb(92, 214, 92)','rgb(191, 128, 255)']);

    function consoleText2(words, id, colors) {
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
<script>


    consoleText(['Book Purchased ...', 'Book Purchased...', 'Book Purchased...'], 'text2',['rgb(255, 0, 102)','rgb(92, 214, 92)','rgb(191, 128, 255)']);

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


    consoleText1(['Recommandations...', 'Recommandations...', 'Recommandations...'], 'text1',['rgb(255, 0, 102)','rgb(92, 214, 92)','rgb(191, 128, 255)']);

    function consoleText1(words, id, colors) {
    if (colors === undefined) colors = ['#fff'];
    var visible = true;
    var con = document.getElementById('console1');
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