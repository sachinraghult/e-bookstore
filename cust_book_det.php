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
    <link rel="stylesheet" type="text/css" href="css/profile.css">
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

    if($res2->num_rows>0){
        echo "
        <div class='container content' style='float:left;width: 450px; height: 270px; margin:3% 13%; background-color:ivory'>
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
    
    if($res->num_rows>0)
    {
        if($res2->num_rows>0){
            echo"
            <div class='card' style='float:left;margin:0% 18%; width: 500px;'>
                <img src='admin/{$rows["bimage"]}' alt='book image' style='width:100%'>
                <h1>{$rows["bname"]}</h1>
                <p>{$rows['author']}</p>
                <p>{$rows['cat_name']}</p>
                <p><a href='admin/{$rows["bfile"]}' target = '_blank'><button style='margin-bottom: 0%;'>View Book</button></a></p>
            </div>
            ";
        }
        else{
            echo"
            <div class='card' style='float:left; margin:5% 18%; width: 500px;'>
                <img src='admin/{$rows["bimage"]}' alt='book image' style='width:100%'>
                <h1>{$rows["bname"]}</h1>
                <p>{$rows['author']}</p>
                <p>{$rows['cat_name']}</p>
                <p><a href='payment.php?id={$rows["bid"]}'><button style='margin-bottom: 0%;'>&#8377; {$rows['price']}</button></a></p>
            </div>
          ";
        }
    }

    else {
        echo "<p style='color: red'>No Records found</p>";
    }
    ?>


    <?php

    
    if ($res1->num_rows > 0) {
        echo "<div style='margin-top:5%; margin-left:55%;'>
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
?>



</body>
</html>