<?php
  session_start();
  if(!isset($_SESSION['CUS_ID']))
  {
      include("includes/main_header.php");
  }
  else
  {
      include("includes/header.php");
  }

  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" type="text/css" href="css/tables.css">

    <style>
    body{
        background: #eedfcc;
    }
    </style>
</head>
<body>

<?php

    $sql = "SELECT book.*, category.cat_name from book inner join category on book.cat_id = category.cat_id where book.bid = {$_GET['id']};";
    $sql1 = "SELECT comment.comment, comment.logs, customer.cus_name from comment inner join customer where comment.cus_id = customer.cus_id and comment.bid = {$_GET['id']}
    ORDER BY comment.com_id DESC;";
    $sql2 = "SELECT * from payments where cus_id = {$_SESSION["CUS_ID"]} and bid = {$_GET["id"]}";
    $res = $db->query($sql);
    $res1 = $db->query($sql1);
    $res2 = $db->query($sql2);
    $rows = $res->fetch_assoc();

    if($res->num_rows>0)
    {
        if($res2->num_rows>0){
            $img = "admin/{$rows['bimage']}";
            echo"
            <div>
                <div class='thumb' style='text-size: 50px; float: left; margin-left: 20px;'>
                <a href='#'>
                    <span ><button class='glow-on-hover' type='button' >View Book</button></span>
                </a>
                </div>   

                <div style='float:right; width:65%; margin-top:10%; margin-bottom:10%'>
                <table class='container' style='background-color:#1F2739;'>
                <thead>
                <tr>
                    <th>BOOK NAME</th>
                    <td><b>{$rows['bname']}</b></td>
                </tr>
                <tr>
                    <th>AUTHOR</th>
                    <td><b>{$rows['author']}</b></td>
                </tr>
                <tr>
                    <th>DESCRIPTION&ensp;&ensp;&ensp;</th>
                    <td><b>{$rows['keywords']}</b></td>
                </tr>
                <tr>
                    <th>PRICE</th>
                    <td><b>&#8377; {$rows['price']}</b></td>
                </tr>
                <tr>
                    <th>CATEGORY</th>
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
            $img = "admin/{$rows['bimage']}";
            echo"
            <div>
                <div class='thumb' style='text-size: 50px; float: left; margin-left: 150px;'>
                <a href='#'>
                    <span ><button class='glow-on-hover' type='button' >Pay</button></span>
                </a>
                </div>   

                <div style='float:right; width:65%; margin-top:10%; margin-bottom:10%'>
                <table class='container' style='background-color:#1F2739;'>
                <thead>
                <tr>
                    <th>BOOK NAME</th>
                    <td><b>{$rows['bname']}</b></td>
                </tr>
                <tr>
                    <th>AUTHOR</th>
                    <td><b>{$rows['author']}</b></td>
                </tr>
                <tr>
                    <th>DESCRIPTION&ensp;&ensp;&ensp;</th>
                    <td><b>{$rows['keywords']}</b></td>
                </tr>
                <tr>
                    <th>PRICE</th>
                    <td><b>&#8377; {$rows['price']}</b></td>
                </tr>
                <tr>
                    <th>CATEGORY</th>
                    <td><b>{$rows['cat_name']}</b></td>
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
    
    if($res2->num_rows>0){
        echo "
        <div style='clear: both;'>
        <div class='container content' style='clear: both; float:left;width: 450px; height: 270px; margin:3% 3%; background-color:ivory'>
        <form action='{$_SERVER['REQUEST_URI']}' method='post' >
            <h1>Add Comment</h1>
            <hr>";
        if(isset($_POST["submit"])){
            $sql3 = "INSERT into comment (cus_id, bid, comment, logs) values ({$_SESSION["CUS_ID"]}, {$_GET["id"]}, '{$_POST["comment"]}', now())";
            $res3 = $db->query($sql3);
            if($res){
                echo "<p style='color:green'>Comment added</p>";
                header("location:{$_SERVER['REQUEST_URI']}");
            }
        }
            echo"
            <label for='name'><b>Comment</b></label>
            <input type='text' placeholder='Search comments' name='comment' required>
            <br>
            <div class='clearfix' style='padding-left: 3px'>
            <button type='submit' class='signup' name='submit'>Submit</button>
            </div>
        </form>
        </div>";
    }
    



    echo "<h1 style='text-align:center;'>Customer Comments</h1> <br><br>";

    if ($res1->num_rows > 0) {
        echo "<div style='float:right; width:65%'>
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
        echo "
        <div style='margin-top:5%; margin-left:50%;'>
        <p style='color: red; text-align:center; font-size:30px'><span style=' background-color:white;'>No Comments</span></p>
        </div>";
    }

    echo '</div>';
?>

<style>
    @import url(https://fonts.googleapis.com/css?family=Montserrat);
/*basic reset*/

/*a nice BG*/
body {
	background: #544; /*fallback*/
	background: linear-gradient(#544, #565);
}

/*Thumbnail Background*/
.thumb {
	width: 500px; height: 750px; margin: 70px 0;
	perspective: 1000px;
}
.thumb a {
	display: block; width: 100%; height: 100%;
	/*double layered BG for lighting effect*/
	background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(<?php echo $img; ?>) no-repeat center top;
    
    background-size: contain;
	/*disabling the translucent black bg on the main image*/
	background-size: 0, cover;
	/*3d space for children*/
	transform-style: preserve-3d;
	transition: all 0.5s;
}
.thumb:hover a {transform: rotateX(80deg); transform-origin: bottom;}
/*bottom surface */
.thumb a:after {
	/*36px high element positioned at the bottom of the image*/
	content: ''; position: absolute; left: 0; bottom: 0; 
	width: 100%; height: 36px;
	/*inherit the main BG*/
	background: inherit; background-size: cover, cover;
	/*draw the BG bottom up*/
	background-position: bottom;
	/*rotate the surface 90deg on the bottom axis*/
	transform: rotateX(90deg); transform-origin: bottom;
    opacity: 0.65;
}
/*label style*/
.thumb a span {
	color: white; text-transform: uppercase;
	position: absolute; top: 100%; left: 0; width: 100%;
	font: bold 12px/36px Montserrat; text-align: center;
	/*the rotation is a bit less than the bottom surface to avoid flickering*/
	transform: rotateX(-89.99deg); transform-origin: top;
	z-index: 1;
}
/*shadow*/
.thumb a:before {
	content: ''; position: absolute; top: 0; left: 0;
	width: 100%; height: 100%;
	background: rgba(0, 0, 0, 0.5); 
	box-shadow: 0 0 100px 50px rgba(0, 0, 0, 0.5);
	transition: all 0.5s; 
	/*by default the shadow will be almost flat, very transparent, scaled down with a large blur*/
	opacity: 0.15;
	transform: rotateX(95deg) translateZ(-80px) scale(0.75);
	transform-origin: bottom;
}
.thumb:hover a:before {
	opacity: 1;
	/*blurred effect using box shadow as filter: blur is not supported in all browsers*/
	box-shadow: 0 0 25px 25px rgba(0, 0, 0, 0.5);
	/*pushing the shadow down and scaling it down to size*/
	transform: rotateX(0) translateZ(-60px) scale(0.85);
}



.glow-on-hover {
    width: 500px;
    height: 40px;
    border: none;
    outline: none;
    color: #fff;
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
}

.glow-on-hover:before {
    content: '';
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
    position: absolute;
    top: -2px;
    left:-2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 20s linear infinite;
    opacity: 0;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
}

.glow-on-hover:active {
    color: #000
}

.glow-on-hover:active:after {
    background: transparent;
}

.glow-on-hover:hover:before {
    opacity: 1;
}

.glow-on-hover:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #111;
    left: 0;
    top: 0;
    border-radius: 10px;
}

@keyframes glowing {
    0% { background-position: 0 0; }
    50% { background-position: 400% 0; }
    100% { background-position: 0 0; }
}

</style>

</body>
</html>