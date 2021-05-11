<?php
  session_start();
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/cards.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <style>
        body{
        background-image: url(images/library.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body>

<?php 
    include("includes/header.php");
?>

    <?php


    if(!isset($_SESSION["CUS_ID"]))
    {
        $sql="SELECT * from book where book.cat_id={$_GET['id']};";
        $res=$db->query($sql);
        echo "<br><br><h3>Available Books :</h3>";
        
        if($res->num_rows>0)
        {
            echo '
            <div class="wrapper">
            <div class="cards_wrap">
            ';
            while($rows=$res->fetch_assoc())
            {
                echo "
                <div class='card_item'>
                <div class='card_inner'>
                    <div class'card_top'>
                    <img src='admin/{$rows['bimage']}' alt='image' />
                    </div>
                    <div class='card_bottom'>
                    <div class='card_info'>
                        <p class='title'>{$rows['bname']}</p>
                        <p>{$rows['author']}</p>
                    </div>
                    <div class='card_creator'>
                        <a href='a.php?id={$rows['bid']}'><button>PAY</button></a>
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
            echo "<p style='color: red'>No Books found  :(</p>";
        }

    }
    else
    {
        $sql1="SELECT * from category where category.cat_id={$_GET["id"]};";
        $res1=$db->query($sql1);
        $rows1=$res1->fetch_assoc();
        echo"<h1 style='text-align: center'>{$rows1['cat_name']}</h1>";

        $sql2="SELECT book.* from book inner join subs where subs.bid=book.bid and subs.cus_id={$_SESSION['CUS_ID']}
               and book.cat_id={$_GET['id']};";
        $res2=$db->query($sql2);

        echo"<h3>BOOKS PURCHASED UNDER {$rows1['cat_name']} :</h3><br>";
        
        if($res2->num_rows>0)
        {
            echo '
            <div class="wrapper">
            <div class="cards_wrap">
            ';
            while($rows2=$res2->fetch_assoc())
            {
                echo '
                <div class="card_item">
                <div class="card_inner">
                    <div class="card_top">
                    <img src="admin/{$rows2["bimage"]}"" alt="image" />
                    </div>
                    <div class="card_bottom">
                    <div class="card_info">
                        <p class="title">{$rows2["bname"]}</p>
                        <p>{$rows2["author"]}</p>
                    </div>
                    <div class="card_creator">
                        <a href="book_det.php?id={$rows2["bid"]}"><button>View Book</button></a>
                    </div>
                    </div>
                </div>
                </div>            
                ';

            }
            echo '
            </div>
            </div>
            ';
        }
        else
        {
            echo "<p style='color: red'>You did'nt purchase any book in {$rows1['cat_name']}  :(</p>";
        }

        $sql3="SELECT * from book
               where not exists (SELECT book.* from book inner join subs where subs.bid=book.bid and subs.cus_id={$_SESSION['CUS_ID']})
               and book.cat_id={$_GET['id']};";
        $res3=$db->query($sql3);

        echo "<br><br><h3>RECOMENDATIONS :</h3>";
        
        if($res3->num_rows>0)
        {
            echo '
            <div class="wrapper">
            <div class="cards_wrap">
            ';
            while($rows3=$res3->fetch_assoc())
            {
                echo "
                <div class='card_item'>
                <div class='card_inner'>
                    <div class'card_top'>
                    <img src='admin/{$rows3['bimage']}' alt='image' />
                    </div>
                    <div class='card_bottom'>
                    <div class='card_info'>
                        <p class='title'>{$rows3['bname']}</p>
                        <p>{$rows3['author']}</p>
                    </div>
                    <div class='card_creator'>
                        <a href='a.php?id={$rows3['bid']}'><button>PAY</button></a>
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
            echo "<p style='color: red'>No Books found  :(</p>";
        }
    }
    ?>


<?php include("includes/footer.php"); ?>