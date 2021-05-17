<?php
  session_start();
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/book_cards.css">
    <link rel="stylesheet" type="text/css" href="css/book_btn.css">
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
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
        echo "<br><br><h3>Available Books :</h3>";
        
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
            echo "<p style='color: red'>No Books found  :(</p>";
        }

    }
    else
    {
        $sql1="SELECT * from category where category.cat_id={$_GET["id"]};";
        $res1=$db->query($sql1);
        $rows1=$res1->fetch_assoc();
        echo"<h1 style='text-align: center'>{$rows1['cat_name']}</h1>";

        $sql2="SELECT book.* from book inner join payments where payments.bid=book.bid and payments.cus_id={$_SESSION['CUS_ID']}
               and book.cat_id={$_GET['id']};";
        $res2=$db->query($sql2);

        echo"<h3>BOOKS PURCHASED UNDER {$rows1['cat_name']} :</h3><br>";
        
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
            echo "<p style='color: red'>You did'nt purchase any book in {$rows1['cat_name']}  :(</p>";
        }

        $sql3="SELECT * from book where book.cat_id={$_GET["id"]}
               EXCEPT
               (SELECT book.* from book inner join payments where payments.bid=book.bid and payments.cus_id={$_SESSION['CUS_ID']});";
        $res3=$db->query($sql3);

        echo "<br><br><h3>RECOMENDATIONS :</h3>";
        
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
            echo "<p style='color: red'>No Books found  :(</p>";
        }
    }
    ?>


<?php include("includes/footer.php"); ?>