<?php
  ob_start();
  session_start();

  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }

  include("db.php");
  $i=0;

  if(isset($_GET["bid"])){
    $chk1 = $db->query("SELECT * from payments where bid={$_GET['bid']} and cus_id={$_SESSION["CUS_ID"]}");
    $chk2 = $db->query("SELECT * from cart where bid={$_GET['bid']} and cus_id={$_SESSION["CUS_ID"]}");
    if($chk1->num_rows == 0 && $chk2->num_rows == 0){
        $qry="INSERT INTO cart (cus_id, bid) values ({$_SESSION["CUS_ID"]}, {$_GET["bid"]});";
        $db->query($qry);
        header("location:cust_book_det.php?id={$_GET['bid']}");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Book</title>
    <link rel="stylesheet" type="text/css" href="css/tables.css">
    <link rel="stylesheet" type="text/css" href="css/book_btn.css">

    <style>
    .blackboard {
        position: absolute;
        width: 500px;
        border: tan solid 12px;
        border-top: #bda27e solid 12px;
        border-left: #b19876 solid 12px;
        border-bottom: #c9ad86 solid 12px;
        box-shadow: 0px 0px 6px 5px rgba(58, 18, 13, 0), 0px 0px 0px 2px #c2a782, 0px 0px 0px 4px #a58e6f, 3px 4px 8px 5px rgba(0, 0, 0, 0.5);
        background-image: radial-gradient( circle at left 30%, rgba(34, 34, 34, 0.3), rgba(34, 34, 34, 0.3) 80px, rgba(34, 34, 34, 0.5) 100px, rgba(51, 51, 51, 0.5) 160px, rgba(51, 51, 51, 0.5)), linear-gradient( 215deg, transparent, transparent 100px, #222 260px, #222 320px, transparent), radial-gradient( circle at right, #111, rgba(51, 51, 51, 1));
        background-color: #333;
    }

    .blackboard:before {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        background-image: linear-gradient( 175deg, transparent, transparent 40px, rgba(120, 120, 120, 0.1) 100px, rgba(120, 120, 120, 0.1) 110px, transparent 220px, transparent), linear-gradient( 200deg, transparent 80%, rgba(50, 50, 50, 0.3)), radial-gradient( ellipse at right bottom, transparent, transparent 200px, rgba(80, 80, 80, 0.1) 260px, rgba(80, 80, 80, 0.1) 320px, transparent 400px, transparent);
        border: #2c2c2c solid 2px;
        content: "Add Comment";
        font-family: 'Permanent Marker', cursive;
        font-size: 2.2em;
        color: rgba(238, 238, 238, 0.7);
        text-align: center;
        padding-top: 20px;
    }

    .form {
        padding: 70px 20px 20px;
    }

    p {
        position: relative;
        margin-bottom: 1em;
    }

    label {
        vertical-align: middle;
        font-family: 'Permanent Marker', cursive;
        font-size: 1.6em;
        color: rgba(238, 238, 238, 0.7);
    }

    p:nth-of-type(5) > label {
        vertical-align: top;
    }

    input,
    textarea {
        vertical-align: middle;
        padding-left: 10px;
        background: none;
        border: none;
        font-family: 'Permanent Marker', cursive;
        font-size: 1.6em;
        color: rgba(238, 238, 238, 0.8);
        line-height: .6em;
        outline: none;
    }


    input[type="submit"] {
        cursor: pointer;
        color: rgba(238, 238, 238, 0.7);
        line-height: 1em;
        padding: 0;
    }

    input[type="submit"]:focus {
        background: rgba(238, 238, 238, 0.2);
        color: rgba(238, 238, 238, 0.2);
    }

    ::-moz-selection {
        background: rgba(238, 238, 238, 0.2);
        color: rgba(238, 238, 238, 0.2);
        text-shadow: none;
    }

    ::selection {
        background: rgba(238, 238, 238, 0.4);
        color: rgba(238, 238, 238, 0.3);
        text-shadow: none;
    }

    @media screen and (min-width: 400px) {
    body {
        background-color: lightgreen;
    }
    }

    </style>
</head>
<body>


<?php 

    $sql = "SELECT book.*, category.cat_name from book inner join category 
            on book.cat_id = category.cat_id where book.bid = {$_GET['id']};";
    $sql1 = "SELECT comment.comment, comment.logs, customer.cus_name from comment inner join customer 
            where comment.cus_id = customer.cus_id and comment.bid = {$_GET['id']}
            ORDER BY comment.com_id DESC;";
    $sql2 = "SELECT * from payments where cus_id = {$_SESSION["CUS_ID"]} and bid = {$_GET["id"]}";
    $res = $db->query($sql);
    $res1 = $db->query($sql1);
    $res3 = $db->query($sql1);
    $res2 = $db->query($sql2);
    $rows = $res->fetch_assoc();

    while($rows3 = $res3->fetch_assoc()){
        $i++;
    }

    echo '<div class="background"></div>';
    include("includes/header.php");
    echo '<head>
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
    <meta name="viewport" content="width=device-width, initial-scale=0.3">
    </head>';

    if($res->num_rows>0)
    {
        if($res2->num_rows>0){
            $file = "admin/{$rows['bfile']}";
            $file = preg_replace('/\s+/', '%20', $file);
            echo"
            <div>
                <a href={$file} target='_blank' style='text-decoration:none;'>
                <div id='curve' class='card' style='float:left; margin: 10%'>
                    <div class='footer'>
                        <div class='connections'>
                            <div class='connection facebook'><div class='icon'>View</div></div>
                        </div>
                        <svg id='curve'>
                            <path id='p' d='M0,200 Q80,100 400,200 V150 H0 V50' transform='translate(0 300)' />
                            <rect id='dummyRect' x='0' y='0' height='450' width='400'
                        fill='transparent' />
                            
                            <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,100 400,50 V150 H0 V50' fill='freeze' begin='dummyRect.mouseover' end='dummyRect.mouseout' dur='0.1s' id='bounce1' />
                            
                            <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,0 400,50 V150 H0 V50' fill='freeze' begin='bounce1.end' end='dummyRect.mouseout' dur='0.15s' id='bounce2' />
                            
                            <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,80 400,50 V150 H0 V50' fill='freeze' begin='bounce2.end' end='dummyRect.mouseout' dur='0.15s' id='bounce3' />
                            
                            <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,45 400,50 V150 H0 V50' fill='freeze' begin='bounce3.end' end='dummyRect.mouseout' dur='0.1s' id='bounce4' />
                            
                            <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,50 400,50 V150 H0 V50' fill='freeze' begin='bounce4.end' end='dummyRect.mouseout' dur='0.05s' id='bounce5' />
                
                            <animate xlink:href='#p' attributeName='d' to='M0,200 Q80,100 400,200 V150 H0 V50' fill='freeze' begin='dummyRect.mouseout' dur='0.15s' id='bounceOut' />
                        </svg>
                        <div class='info'>
                            <div class='name' style='color:black'>{$rows['bname']}</div>
                            <div class='job' style='color:black'>{$rows['author']}</div>
                        </div>
                        </div>
                            <div class='card-blur'></div>
                        </div>
                </div> 
                </a>
            
            <div style='float:right;  margin-left: 20%; margin-top: 5%; position: absolute;'>
            <table class='container' style='background-color:#1F2739; width: 60%'>
            <thead>
            <tr>
                <th style='color: #FB667A'>BOOK NAME</th>
                <td><b>{$rows['bname']}</b></td>
            </tr>
            <tr>
            <th style='color: #FB667A'>AUTHOR</th>
                <td><b>{$rows['author']}</b></td>
            </tr>
            <tr>
            <th style='color: #FB667A'>DESCRIPTION&ensp;&ensp;&ensp;</th>
                <td><b>{$rows['keywords']}</b></td>
            </tr>
            <tr>
            <tr>
            <th style='color: #FB667A'>CATEGORY</th>
                <td><b>{$rows['cat_name']}</b></td>
            </tr>
            </thead>
            <tbody></tbody>
            </table>
            </div>
            </div>
          ";
        }
        else{
            $file = $rows['bfile'];
            $file = preg_replace('/\s+/', '%20', $file);
            echo"
            <div>
            <a href='payment.php?id={$rows['bid']}' target='_blank' style='text-decoration:none;'>
            <div id='curve' class='card' style='float:left; margin: 10%'>
                <div class='footer'>
                    <div class='connections'>
                        <div class='connection facebook'><div class='icon'>Buy</div></div>
                    </div>
                    <svg id='curve'>
                        <path id='p' d='M0,200 Q80,100 400,200 V150 H0 V50' transform='translate(0 300)' />
                        <rect id='dummyRect' x='0' y='0' height='450' width='400'
                    fill='transparent' />
                        
                        <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,100 400,50 V150 H0 V50' fill='freeze' begin='dummyRect.mouseover' end='dummyRect.mouseout' dur='0.1s' id='bounce1' />
                        
                        <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,0 400,50 V150 H0 V50' fill='freeze' begin='bounce1.end' end='dummyRect.mouseout' dur='0.15s' id='bounce2' />
                        
                        <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,80 400,50 V150 H0 V50' fill='freeze' begin='bounce2.end' end='dummyRect.mouseout' dur='0.15s' id='bounce3' />
                        
                        <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,45 400,50 V150 H0 V50' fill='freeze' begin='bounce3.end' end='dummyRect.mouseout' dur='0.1s' id='bounce4' />
                        
                        <animate xlink:href='#p' attributeName='d' to='M0,50 Q80,50 400,50 V150 H0 V50' fill='freeze' begin='bounce4.end' end='dummyRect.mouseout' dur='0.05s' id='bounce5' />
            
                        <animate xlink:href='#p' attributeName='d' to='M0,200 Q80,100 400,200 V150 H0 V50' fill='freeze' begin='dummyRect.mouseout' dur='0.15s' id='bounceOut' />
                    </svg>
                    <div class='info'>
                        <div class='name' style='color:black'>{$rows['bname']}</div>
                        <div class='job' style='color:black'>{$rows['author']}</div>
                    </div>
                    </div>
                        <div class='card-blur'></div>
                    </div>
            </div> 
            </a>
    
                <div style='float:right;  margin-left: 20%; margin-top: 5%; position: absolute;'>
                <table class='container' style='background-color:#1F2739; width: 60%'>
                <thead>
                <tr>
                    <th style='color: #FB667A'>BOOK NAME</th>
                    <td><b>{$rows['bname']}</b></td>
                </tr>
                <tr>
                <th style='color: #FB667A'>AUTHOR</th>
                    <td><b>{$rows['author']}</b></td>
                </tr>
                <tr>
                <th style='color: #FB667A'>DESCRIPTION&ensp;&ensp;&ensp;</th>
                    <td><b>{$rows['keywords']}</b></td>
                </tr>
                <tr>
                <th style='color: #FB667A'>PRICE</th>
                    <td><b>&#8377; {$rows['price']}</b></td>
                </tr>
                <tr>
                <th style='color: #FB667A'>CATEGORY</th>
                    <td><b>{$rows['cat_name']}</b></td>
                </tr>";

                $qry1="SELECT * from cart where cart.bid={$_GET["id"]} and cart.cus_id={$_SESSION["CUS_ID"]}";
                $ans=$db->query($qry1);
                echo"
                <tr>
                    <th  colspan='2' style='color: #FB667A; text-align:center; background-color:#5499C7'>";
                    if($ans->num_rows==0){
                        echo"
                        <a style='text-decoration:none' href='cust_book_det.php?bid={$rows['bid']}'>
                            <button class='custom-btn btn' style='background-color: red; background-image: linear-gradient(315deg, orange 0%, tomato 74%)'>
                            <b>Add to Cart</b>
                            </button>
                        </a>";
                    }
                    else{
                        echo"
                        <a style='text-decoration:none'>
                            <button class='custom-btn btn' style='background-color: green; background-image: linear-gradient(315deg, green 0%, greenyellow 74%)' disabled>
                            <b><span style='color:black'>Added to Cart</span></b>
                            </button>
                        </a>";
                    }
                echo"
                    </th>
                </tr>

                </thead>
                <tbody></tbody>
                </table>
                </div>
                </div>
          ";
        }
    }

    else {
        echo "<p style='color: red'>No Records found</p>";
    }
    ?>


    <?php    

    echo "<h1 style='position: absolute; margin-top: 650px; margin-left: 30%;'>Customer Comments</h1> <br><br>";

    
    if($res2->num_rows>0){
        echo "
        <div class='container content' style='position: absolute; float:left; height: 400px; margin-top: 700px; margin-left: 10%;'>
        <form action='{$_SERVER['REQUEST_URI']}' method='post'>
        <div class='blackboard'>
        <div class='form'>
        <hr>";
        if(isset($_POST["submit"])){

            $_POST["comment"] = addslashes($_POST["comment"]);

            $sql3 = "INSERT into comment (cus_id, bid, comment, logs) values ({$_SESSION["CUS_ID"]}, {$_GET["id"]}, '{$_POST["comment"]}', now())";
            $res3 = $db->query($sql3);
            if($res){
                echo "<p style='color:green'>Comment added</p>";
                header("location:{$_SERVER['REQUEST_URI']}");
            }
        }
            echo"
            <p><br>
            <label for='name'><b>Comment</b></label>
            <input type='text' name='comment' required>
            </p><br><br>
            <p class='wipeout'>
            <input type='submit' name='submit' value='Add:-' /></p>
            </div>
        </div>
        </form>
        </div>";
    }
   
    if ($res1->num_rows > 0) {
        if($res2->num_rows>0){
            echo "<div style='position: absolute; float:right; width:50%; margin-top: 700px; margin-left: 600px;'>";
        }
        else{
            echo "<div style='position: absolute; margin-top: 680px; margin-left: 10%; width: 60%'>";

        }
        echo"
        <table class='container' style='background-color:#1F2739;'>
        <thead>
        <tr>
            <th>CUSTOMER NAME</th>
            <th>COMMENT</th>
            <th>TIME LOG</th>
        </tr>
        </thead>    
        <tbody>
        ";
        while($rows1 = $res1->fetch_assoc()){
            echo"
                <tr>
                    <td><b>{$rows1['cus_name']}</b></td>
                    <td>{$rows1['comment']}</td>
                    <td><i>{$rows1['logs']}</i></td>
                </tr>";
        }
        echo "  
        </tbody>
        </table>
        </div>
            ";
    }

    else {
        if($res2->num_rows>0){
            echo "<div style='margin: 680px; margin-left:1000px; margin-right:0px; position:absolute; float:right'>";
        }
        else{
            echo "<div style='margin: 680px; margin-left:700px; margin-right:0px; position:absolute; float:right'>";
        }
        echo"
        <p style='color: red; text-align:center; font-size:30px'><span style=' background-color:white;'>No Comments</span></p>
        </div>";
    }
    ob_end_flush();
?>

<style>
html,
body {
    height: 100%;
    width: 100%;
}

.background {
    position: absolute;
    top: -40px;
    left: -40px;
    height: <?php echo 200+($i*7.5)?>%;
    width: 103%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    -webkit-filter: blur(30px);
    filter: blur(30px);
}


.card {
    position: absolute;
    border-radius: 8px;
    height: 500px;
    width: 400px;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    margin: auto;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    box-shadow: 0 0 80px -10px black;
    overflow: hidden;
}

.card-blur {
    position: absolute;
    height: 100%;
    width: calc(100% + 1px);
    background-color: black;
    opacity: 0;
    transition: opacity 0.15s ease-in;
}

.card:hover .card-blur {
    opacity: 0.6;
}

.footer {
    z-index: 1;
    position: absolute;
    height: 80px;
    width: 100%;
    bottom: 0;
}

svg#curve {
    position: absolute;
    fill: white;
    left: 0;
    bottom: 0;
    width: 400px;
    height: 450px;
}

.connections {
    height: 80px;
    width: 400px;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 100px;
    margin: auto;
}

.connection {
    height: 25px;
    width: 25px;
    border-radius: 100%;
    background-color: white;
    display: inline-block;
    padding: 5px;
    margin-right: 25px;
    transform: translateY(200px);
    transition: transform 1s cubic-bezier(.46, 1.48, .18, .81);
}

.card:hover .connection {
    transform: translateY(0px);
}

.info {
	font-family: Inconsolata;
    padding-left: 20px;
    transform: translateY(250px);
    
    transition: transform 1s cubic-bezier(.31,1.21,.64,1.02);
}

.card:hover .info {
    transform: translateY(0px);
}

.name {
    font-weight: bolder;
    padding-top: 5px;
}

.job {
    margin-top: 10px;
}

.connection.facebook {
    height: 40px;
    width: 70px;
    margin-left: 20px;
    padding: 5px 13px;
    border-radius: 10%;
    overflow: hidden;
    background-color: #ff1a75;
}

.connection.facebook .icon {
    height: 100%;
    width: 100%;
    background-position: center;
    background-size: cover;
    color: black;
    font-size: 20px;
    font-weight: bold;
}

.card {
    background-image: url("<?php echo "admin/{$rows['bimage']}"?>");
}

.background {
    background-image: url("<?php echo "admin/{$rows['bimage']}"?>");
}
</style>

</body>
</html>
