<?php
    session_start();
    include("../db.php");
    if(!isset($_SESSION["AID"])){
        header("location:../admin_login.php");
    }

    if(isset($_GET['id']))
    {
        $sql="DELETE FROM comment where com_id={$_GET['id']};";
        $res=$db->query($sql);
        header('location: comment.php');
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
    $sql="SELECT customer.cus_name, book.bname, comment.*
    from comment inner join customer on customer.cus_id=comment.cus_id
    inner join book on book.bid=comment.bid
    order by comment.com_id DESC;";
    $res=$db->query($sql);

    echo "<h3 style='text-align: center;'>CUSTOMER COMMENTS</h3>";
    if($res->num_rows>0)
    {
        echo "
        <div>
        <table>
            <tr>
                <th>CUSTOMER NAME</th>
                <th>BOOK NAME</th>
                <th>COMMENT</th>
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
                    <td>{$rows["comment"]}</td>
                    <td>{$rows["logs"]}</td>
                    <td><a style='color: red' href='comment.php?id={$rows['com_id']}'>Delete</a></td>
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
        echo "<p style='color: red'>No comments</p>";
    }
?>
    

</div>
</body>
</html>