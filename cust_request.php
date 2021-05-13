<?php
  session_start();
  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }
  include("db.php");

  if(isset($_GET['id']))
    {
        $sql1="DELETE FROM request where rid={$_GET['id']};";
        $res1=$db->query($sql1);
        header('location: cust_request.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <link rel="stylesheet" type="text/css" href="css/cards.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>

<?php
    if(!isset($_SESSION['CUS_ID']))
    {
        include("includes/main_header.php");
    }
    else
    {
        include("includes/header.php");
    }

?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>"  method = "post">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
    <h1>Add Request</h1>
    <hr>

    <?php
        if (isset($_POST["submit"])) {
            $sql = "INSERT INTO request (cus_id ,bname, request, logs) VALUES ({$_SESSION["CUS_ID"]},'{$_POST["bname"]}','{$_POST["request"]}', now());";
            $res = $db->query($sql);

            if ($res) {
                echo "<p style='color:green;'>Request Sent Successfully</p>";
                header("location:cust_request.php");
            }
            else {
                echo "<p style='color:red;'>Unable to send request</p>";
            }
        }
    ?>

    <label for="bname"><b>Name Of the Book</b></label>
    <input type="text" placeholder="Enter the name of book" name="bname" required>

    <label for="request"><b>Request</b></label>
    <br>
    <div style="padding-top:7px">
    <textarea name="request" placeholder="Enter your request" rows="3" cols="40" style="background-color : rgb(243, 243, 243);"></textarea>
    </div>
    
    <br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="submit" name="submit">Submit</button>
    </div>
  </div>
</form>

    <?php
        $sql="SELECT * FROM request where request.cus_id = {$_SESSION["CUS_ID"]};";
        $res=$db->query($sql);
    
        if($res->num_rows>0)
        {
            echo "
            <div>
            <table>
                <tr>
                    <th>BOOK NAME</th>
                    <th>REQUEST</th>
                    <th>TIME LOG</th>
                    <th>UNSEND</th>
                </tr>
            ";
            while($rows=$res->fetch_assoc())
            {
                echo"
                    <tr>
                        <td>{$rows["bname"]}</td>
                        <td>{$rows["request"]}</td>
                        <td>{$rows["logs"]}</td>
                        <td><a style='color: red' href='cust_request.php?id={$rows['rid']}'>Unsend</a></td>
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

    </body>
</html>
