<?php
    session_start();
    include("../db.php");
    if(!isset($_SESSION["AID"])){
        header("location:../admin_login.php");
    }

    if(isset($_GET['id']))
    {
        $sql="DELETE FROM request where rid={$_GET['id']};";
        $res=$db->query($sql);
        header('location: request.php');
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
    $sql="SELECT customer.cus_name, request.*
    from request inner join customer
    where customer.cus_id=request.cus_id;";
    $res=$db->query($sql);

    echo "<h3 style='text-align: center;'>CUSTOMER REQUESTS</h3>";
    if($res->num_rows>0)
    {
        echo "
        <div>
        <table>
            <tr>
                <th>CUSTOMER NAME</th>
                <th>BOOK NAME</th>
                <th>REQUEST</th>
                <th>TIME LOG</th>
                <th>DELETE</th>
            </tr>
        ";
        while($rows=$res->fetch_assoc())
        {
            echo"
                <tr>
                    <td>{$rows["cus_name"]}</td>
                    <td>{$rows["bname"]}</td>
                    <td>{$rows["request"]}</td>
                    <td>{$rows["logs"]}</td>
                    <td><a style='color: red' href='request.php?id={$rows['rid']}'>Delete</a></td>
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
        echo "<p style='color: red'>No requests</p>";
    }
?>
    

</div>
</body>
</html>