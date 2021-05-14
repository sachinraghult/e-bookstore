<?php
    session_start();
    include("../db.php");
    if(!isset($_SESSION["AID"])){
        header("location:../admin_login.php");
    }
    include("header.php");
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
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <link rel="stylesheet" type="text/css" href="../css/font.scss">
</head>
<body>

<div class="patterns">
  <svg width="100%" height="50%">         
    <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"> </rect>
 <text x="50%" y="60%"  text-anchor="middle"  >
   Customer Requests
 </text>
 </svg>
</div>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 20px; background-color:ivory">
    <h1>Search requests</h1>
    <hr>

    <label for="searchby">Search by&ensp;&ensp;</label>
    <select name="searchby" style="background-color: rgb(235, 235, 235);width:80%;height:40px;" >
        <option value="request.bname">Book</option>   
        <option value="customer.cus_name">Customer</option>
        <option value="request.request">Request</option>
    </select>
    <br><br>

    <label for="name"><b>Search</b></label>
    <input type="text" placeholder="Enter to search" name="name">
    <br>
    <div class="clearfix" style="padding-left: 3px"> 
      <button type="submit" class="signup" name="search" style="width: 48%;">Search</button>
      <a href="<?php echo $_SERVER["PHP_SELF"];?>"><button class="signup" style="background-color: red;width:48%;float:right;">Clear</button></a>
    </div>
  </div><br>
</form>
<?php
    if (!isset($_POST['search'])) {
        $sql="SELECT customer.cus_name, request.*
        from request inner join customer
        where customer.cus_id=request.cus_id;";
    }
    else {
        $sql = "SELECT customer.cus_name, request.*
        from request inner join customer
        where customer.cus_id=request.cus_id and {$_POST['searchby']} LIKE '%{$_POST['name']}%';";
    }
    $res=$db->query($sql);

    if($res->num_rows>0)
    {
        echo "
        <div>
        <table class='container'>
            <thead>
            <tr>
                <th>CUSTOMER NAME</th>
                <th>BOOK NAME</th>
                <th>REQUEST</th>
                <th>TIME LOG</th>
                <th>DELETE</th>
            </tr>
            </thead>
        <tbody>
        ";
        while($rows=$res->fetch_assoc())
        {
            echo"
                <tr>
                    <td>{$rows["cus_name"]}</td>
                    <td>{$rows["bname"]}</td>
                    <td>{$rows["request"]}</td>
                    <td>{$rows["logs"]}</td>
                    <td><a style='color: red;' href='request.php?id={$rows['rid']}'>Delete</a></td>
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
        echo "<p style='color: red'>No requests</p>";
    }
?>
    

</div>
</body>
</html>