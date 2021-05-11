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
    <link rel="stylesheet" type="text/css" href="../css/register.css">
</head>
<body>

<?php 
    include("header.php");
?>
<h1 style="color: blue; text-align:center">Customer details</h1>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post" style="border:1px solid #ccc">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
    <h1>Search Customer</h1>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Name" name="name">
    <br>
    <div class="clearfix" style="padding-left: 3px"> 
      <button type="submit" class="signup" name="search" style="width: 48%;">Search</button>
      <a href="<?php echo $_SERVER["PHP_SELF"];?>"><button class="signup" style="background-color: red;width:48%;float:right;">Clear</button></a>
    </div>
  </div>
</form>
<?php
    if (!isset($_POST["search"])) {
        $sql = "SELECT * FROM CUSTOMER";
    }
    else {
        $sql = "SELECT * FROM CUSTOMER WHERE cus_name LIKE '%{$_POST['name']}%'";
    }
    $res = $db->query($sql);
    if($res->num_rows>0)
    {
        echo' <div class="wrapper">
             <div class="cards_wrap">';
            while($rows=$res->fetch_assoc())
            {
                echo "
                    <div class='card_item'>
                    <div class='card_inner'>
                        <div class='card_top'>
                            <img src='../{$rows["cus_image"]}' alt='profile' />
                        </div>
                        <div class='card_bottom'>
                        <div class='card_info'>
                            <p class='title'>{$rows["cus_name"]}</p>
                            <p>
                            {$rows['cus_mail']}
                            </p>
                        </div>
                        <div class='card_creator'>
                        <a href='cust_trans.php?id={$rows["cus_id"]}'><button>View Transaction Details</button></a>
                        </div>
                        </div>
                    </div>
                    </div>
                    ";
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