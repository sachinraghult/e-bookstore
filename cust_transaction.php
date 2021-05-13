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
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="css/tables.css">
    
</head>
<body>

<?php include("includes/header.php");?>

<h3 style='text-align: center;'>YOUR BILLING HISTORY</h3>

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
        <table>
            <tr>
                <th>TRANSACTION ID</th>
                <th>BOOK NAME</th>
                <th>PRICE</th>
                <th>LOGS</th>
            </tr>
        ";
        while($rows=$res->fetch_assoc())
        {
            echo"
                <tr>
                    <td>{$rows["txn_id"]}</td>
                    <td>{$rows["bname"]}</td>
                    <th>{$rows["price"]}</th>
                    <th>{$rows["logs"]}</th>
                </tr>
            ";
        }

        echo"
        </table>
        </div>
        ";
    }
    else
    {
        echo "<p style='color: red'>No Transactions</p>";
    }

?>