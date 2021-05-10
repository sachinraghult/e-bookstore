<?php
  session_start();
  include("../db.php");
  if(!isset($_SESSION["AID"])){
    header("location:../admin_login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Details</title>
    <link rel="stylesheet" type="text/css" href="../css/cards.css">
</head>
<body>

<?php 
    include("header.php");
?>
<h1 style="color: blue; text-align:center">Customer details</h1>
<?php

    $sql = "SELECT * FROM CUSTOMER";
    $res = $db->query($sql);

    if($res->num_rows>0)
    {
        while($rows=$res->fetch_assoc())
        {
            echo '
            <div class="wrapper">
            <div class="cards_wrap">
                <div class="card_item">
                <div class="card_inner">
                    <div class="card_top">
                    <img src="https://i.imgur.com/qhE9KtV.jpg" alt="car" />
                    </div>
                    <div class="card_bottom">
                    <div class="card_category">
                        Travel
                    </div>
                    <div class="card_info">
                        <p class="title">10 Best Things about Travel</p>
                        <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, ab.
                        </p>
                    </div>
                    <div class="card_creator">
                        By Alex Kato
                    </div>
                    </div>
                </div>
                </div>
                ';
        }
        echo "
        </div>
        </div>
        ";
    }
    else
    {
        echo "<p style='color: red'>No Records found</p>";
    }

?>

    </div>
    </body>
    </html>