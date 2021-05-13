<?php
    session_start();
    include("../db.php");
    if(!isset($_SESSION["AID"])){
        header("location:../admin_login.php");
    }
    include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="../css/tables.css">
</head>
<body>

<?php
    $sql="SELECT book.bname, book.price, payments.txn_id, payments.logs
    from payments inner join book 
    where book.bid=payments.bid AND payments.cus_id={$_GET["id"]}
    order by payments.bill_id DESC;";
    $res=$db->query($sql);

    $sql1="SELECT cus_name from customer where cus_id={$_GET["id"]}";
    $res1=$db->query($sql1);
    $rows1=$res1->fetch_assoc();

    echo "<h3 style='text-align: center;'>{$rows1["cus_name"]} TRANSACTION DETAILS</h3>";
    if($res->num_rows>0)
    {
        echo "
        <div>
        <table class='container'>
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
    

</div>
</body>
</html>