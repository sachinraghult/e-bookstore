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
    <link rel="stylesheet" type="text/css" href="../css/profile1.css">
    <link rel="stylesheet" type="text/css" href="../css/font.scss">
</head>
<body>

<?php 
    include("header.php");
?>
<div class="patterns">
  <svg width="100%" height="50%">         
    <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"> </rect>
 <text x="50%" y="60%"  text-anchor="middle"  >
   Customer Details
 </text>
 </svg>
</div>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
    <br><h1>Search Customer</h1><br>
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
<div style="display: inline-flexbox;">
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
        echo "<div class='box'>";
        $i = 0;
            while($rows=$res->fetch_assoc())
            {
              if (($i++)%3 == 0){
                echo "</div><div class='box'>";
              }
                echo "
                <div class='card' style='float:left;'>
                <div class='imgBx'>
                  <img src='../{$rows['cus_image']}' alt='profile' style='width:100%'></div>
                  <div class='details'><b>
                  <h2>{$rows['cus_name']}</h2>
                  <h2><span>{$rows['cus_mail']}<br><br>
                  <a href='cust_trans.php?id={$rows["cus_id"]}' class='rainbow rainbow-1' style='border-radius:30px;text-decoration:none'>View Transactions</a></span></h2>
                </div></div>
                    ";
            }
        echo "
        </div>
        ";
    }
    else
    {
        echo "<p style='color: red'>No Records found</p>";
    }

?>

    </div></div>
    </body>
    </html>