<?php
  session_start();
  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <link rel="stylesheet" type="text/css" href="css/cards.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>

<?php
    if(!isset($_SESSION['CUS_ID']))
    {
        include("includes/main_header.php");
    }
    else
    {
        include("includes/header.php");
    }

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
            echo"<div class='wrapper'>
                    <div class='cards_wrap'>
                    <div class='card_item'>
                    <div class='card_inner'>
                            <div class='card_top'>
                                <img src={$rows["bimage"]} alt='profile' />
                            </div>
                            <div class='card_bottom'>
                            <div class='card_info'>
                                <p class='title'>{$rows["bname"]}</p>
                                <p>
                                {$rows['author']}
                                </p>
                                <p>
                                {$rows['cat_name']}
                                </p>
                            </div>
                            <div class='card_creator'>
                            <a href='{$rows["bfile"]}' target = '_blank'><button>View Book</button></a>
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
                </div>
                ";
        }
        else{
            echo"<div class='wrapper'>
                    <div class='cards_wrap'>
                    <div class='card_item'>
                    <div class='card_inner'>
                            <div class='card_top'>
                                <img src={$rows["bimage"]} alt='profile' />
                            </div>
                            <div class='card_bottom'>
                            <div class='card_info'>
                                <p class='title'>{$rows["bname"]}</p>
                                <p>
                                {$rows['author']}
                                </p>
                                <p>
                                {$rows['cat_name']}
                                </p>
                            </div>
                            <div class='card_creator'>
                            <a href='payment.php?id={$rows['bid']}'><button>Pay</button></a>
                            </div>
                            </div>
                        </div>
                        </div>
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
    if ($res1->num_rows > 0) {
        if($res2->num_rows>0){
            echo "<form action='{$_SERVER['REQUEST_URI']}' method='post' style='border:1px solid #ccc'>
            <div class='container content' style='width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory'>
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
                <label for='name'><b>Name</b></label>
                <input type='text' placeholder='Name' name='comment' required>
                <br>
                <div class='clearfix' style='padding-left: 3px'>
                <button type='submit' class='signup' name='submit'>Submit</button>
                </div>
            </div>
            </form>";
        }
        echo "<div style='text-align: center;'>
        <table>
        <tr>
            <th>CUSTOMER NAME</th>
            <th>COMMENT</th>
            <th>TIME LOG</th>
        </tr>
        ";
        while($rows1 = $res1->fetch_assoc()){
            echo"
                <tr>
                    <td>{$rows1['cus_name']}</td>
                    <td>{$rows1['comment']}</td>
                    <td>{$rows1['logs']}</td>
                </tr>";
        }
        echo "  
            </table>
            </div>";
    }
    else {
        echo "<p style='color: red'>No Comments</p>";
    }
?>



</body>
</html>