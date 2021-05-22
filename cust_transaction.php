<?php
  session_start();
  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }
  include("db.php");
  include("includes/header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Transactions</title>
    
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
    <link rel="stylesheet" type="text/css" href="css/tables.css">
    
    
</head>
<body>

<div class="patterns"  style='margin-right: 10%'>
  <svg width="100%" height="50%">         
    <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"> </rect>
 <text x="50%" y="60%"  text-anchor="middle"  >
   Your Billing Details
 </text>
 </svg>
</div>

<?php
    $sql = "SELECT book.bname, book.price, payments.txn_id, payments.logs
            from payments inner join book on book.bid=payments.bid
            where payments.cus_id = {$_SESSION["CUS_ID"]}
            order by payments.bill_id DESC;";
    
    $res = $db->query($sql);

    if($res->num_rows>0)
    {
        echo "
        <div>
        <table class='container' style='margin-left: 15%; background-color:#1F2739;''>
        <thead>
            <tr>
                <th>TRANSACTION ID</th>
                <th>BOOK NAME</th>
                <th>PRICE</th>
                <th>LOGS</th>
            </tr>
        </thead>
        <tbody>
        ";
        while($rows=$res->fetch_assoc())
        {
            echo"
                <tr>
                    <td>{$rows["txn_id"]}</td>
                    <td>{$rows["bname"]}</td>
                    <td>{$rows["price"]}</td>
                    <td>{$rows["logs"]}</td>
                </tr>
            ";
        }

        echo"
        </tbody>
        </table>
        </div>
        ";
    }
    else
    {
        echo "<p style='color: red'>No Transactions</p>";
    }

?>

<style>
  #transaction{
    background: #8ae600;
  }

  #transaction:after{
    color: #8ae600;
  }
</style>