<?php
  session_start();
  include("db.php");
  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }
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
        include("includes/header.php");
?>

<?php
    if (isset($_SESSION["CUS_ID"])) 
    {
        $sql2="SELECT book.*,category.cat_name from book inner join payments on payments.bid=book.bid and payments.cus_id={$_SESSION['CUS_ID']}
        inner join category on category.cat_id = book.cat_id
        ORDER by payments.bill_id DESC";

        $res2=$db->query($sql2);
        echo"<h3>Your Store : )</h3><br>";
        
        if($res2->num_rows>0)
        {
            echo "
            <div class='wrapper'>
            <div class='cards_wrap'>
            ";
            while($rows2=$res2->fetch_assoc())
            {
                echo "
                <div class='card_item'>
                <div class='card_inner'>
                    <div class='card_top'>
                    <img src='admin/{$rows2['bimage']}' alt='image' />
                    </div>
                    <div class='card_bottom'>
                    <div class='card_info'>
                        <p class='title'>{$rows2['bname']}</p>
                        <p>{$rows2['author']}</p>
                        <p>{$rows2['cat_name']}</p>
                    </div>
                    <div class='card_creator'>
                        <a href='cust_book_det.php?id={$rows2["bid"]}'><button>View Book</button></a>
                    </div>
                    </div>
                </div>
                </div>            
                ";
            }
            echo '
            </div>
            </div>
            ';
        }
        else
        {
            echo "<p style='color: red'>Sorry, you did'nt purchase any book  :(</p>";
        }
    }
?>
    </div>
    </body>
    </html>