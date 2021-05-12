<?php
  session_start();
  include("db.php");
  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }
?>

<?php
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    
    <style>
    body{
      background: #eedfcc;
      color: #555555;
      font-size: 16px;
    }
    </style>

    <title>Payment Gateway</title>
</head>
<body>

<?php
    $sql="SELECT book.bname, book.price from book where book.bid={$_GET["id"]};";
    $res=$db->query($sql);
    $rows=$res->fetch_assoc();

    if(isset($_POST["ODRER_ID"]))
    {
        header("location:profile.php");
    }
?>

<form method="POST" action="pgRedirect.php?" style="border:1px solid #ccc;">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 70px; background-color:ivory">
    <h1>Payment Details</h1>
    <hr>
    <label for="ORDER_ID">Transaction ID</label>
    <input id="ORDER_ID"  name="ORDER_ID" value="<?php echo "OD".rand(10000,500000) ?>" type="text" readonly/>

    <label for="CUST_ID">Customer Name</label>
    <input type="text" id="CUST_ID" name="CUST_ID" 
    value="<?php echo $_SESSION['CUS_NAME'];?>" readonly/>

    <label for="TXN_AMOUNT">Transaction Amount</label>
    <input type="text" id="TXN_AMOUNT" name="TXN_AMOUNT" value="<?php echo $rows['price'];?>" readonly/>

    <label for="bname"><b>Book Name</b></label>
    <input type="text" name="bname" id="bname" value="<?php echo $rows['bname'];?>" readonly>

    <div style="display: none;">
    <label for="">INDUSTRY TYPE ID</label>
    <input id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" type="text" value="Film" />

    <label for="">CHANNEL ID</label>
    <input id="CHANNEL_ID" name="CHANNEL_ID" type="text" value="WEB"/>
    </div>

    <br><br>

    <div class="clearfix" style="padding-left: 3px">
    <input type="hidden" name="bid" value="<?php echo $_GET["id"]; ?>"/>
    <button type="submit"/>Pay</button>
    </div>
  </div>
</form>

</body>
</html>