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
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="../css/tables.css">
</head>
<body>
<?php 
    include("header.php");
?>
<?php
    $sql="SELECT customer.cus_name, book.bname, book.price, payments.txn_id
    from payments inner join book on book.bid=payments.bid
    inner join customer on customer.cus_id=payments.cus_id
    order by payments.bill_id DESC;";
    $res=$db->query($sql);

    echo "<h3 style='text-align: center;'>CUSTOMERS BILLING HISTORY</h3>";
    if($res->num_rows>0)
    {
        echo "
        <div>
        <table>
            <tr>
                <th>TRANSACTION ID</th>
                <th>CUSTOMER NAME</th>
                <th>BOOK NAME</th>
                <th>PRICE</th>
            </tr>
        ";
        while($rows=$res->fetch_assoc())
        {
            echo"
                <tr>
                    <td>{$rows["txn_id"]}</td>
                    <td>{$rows["cus_name"]}</td>
                    <td>{$rows["bname"]}</td>
                    <th>{$rows["price"]}</th>
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
    

</div>
</body>
</html>